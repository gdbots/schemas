/* eslint-disable no-useless-escape */
import md5 from 'md5';
import trim from 'lodash/trim';
import AssertionFailed from '@gdbots/pbj/exceptions/AssertionFailed';
import Identifier from '@gdbots/pbj/well-known/Identifier';

/**
 * Regular expression pattern for matching a valid StreamId string.
 * @type {RegExp}
 */
export const VALID_PATTERN = /^([\w\.-]+)(:([\w\.-]+)(:([\w\.-]+))?)?$/;

/**
 * A stream id represents a stream of events.  The parts of the id are delimited by a colon
 * for our purposes but can easily be converted to acceptable formats for SNS, Kafka, etc.
 *
 * It may also be desirable to only use parts of the stream id (e.g. topic) for broadcast.
 *
 * Using a partition and optionally a sub-partition makes it possible to group all of those
 * records together in storage and also guarantee their sequence is exactly in the order
 * that they were added to the stream.
 *
 * StreamId Format:
 *  topic:partition:sub-partition
 *
 * Formats:
 *  TOPIC:         [\w\.-]+
 *  PARTITION:     ([\w\.-]+)?
 *  SUB_PARTITION: ([\w\.-]+)?
 *
 * Examples:
 *  "twitter.timeline" (topic), "homer-simpson" (partition), "yyyymm" (sub-partition)
 *      twitter.timeline:homer-simpson:201501
 *      twitter.timeline:homer-simpson:201502
 *      twitter.timeline:homer-simpson:201503
 *
 *  "bank-account" (topic), "homer-simpson" (partition)
 *      bank-account:homer-simpson
 *
 *  "poll.votes" (topic), "batman-vs-superman" (partition), "yyyymm.[0-9a-f][0-9a-f]" (sub-partition)
 *  Note the sub-partition here is two hexidecimal digits allowing for 256 separate streams ids.
 *  Useful when you need to avoid hot keys and ordering in the overall partition isn't important.
 *      poll.votes:batman-vs-superman:20160301.0a
 *      poll.votes:batman-vs-superman:20160301.1b
 *      poll.votes:batman-vs-superman:20160301.c2
 *
 */
export default class StreamId extends Identifier {
  /**
   * @param {string}  topic
   * @param {?string} partition
   * @param {?string} subPartition
   */
  constructor(topic, partition = null, subPartition = null) {
    let value = topic;
    if (partition !== null && partition.length) {
      value += `:${partition}`;
      if (subPartition !== null && subPartition.length) {
        value += `:${subPartition}`;
      }
    }

    super(value);

    this.topic = topic;
    this.partition = partition;
    this.subPartition = subPartition;

    if (this.value.length > 145) {
      throw new AssertionFailed('StreamId cannot be greater than 145 chars.');
    }

    if (!VALID_PATTERN.test(this.value)) {
      throw new AssertionFailed(
        `StreamId [${this.value}] is invalid. It must match the pattern [${VALID_PATTERN}].`,
      );
    }

    Object.freeze(this);
  }

  /**
   * @param {string} value
   *
   * @returns {StreamId}
   */
  static fromString(value) {
    if (!VALID_PATTERN.test(value)) {
      throw new AssertionFailed(
        `StreamId [${value}] is invalid. It must match the pattern [${VALID_PATTERN}].`,
      );
    }

    return new StreamId(...value.split(':'));
  }

  /**
   * @returns {string}
   */
  getTopic() {
    return this.topic;
  }

  /**
   * @returns {boolean}
   */
  hasPartition() {
    return this.partition !== null;
  }

  /**
   * @returns {?string}
   */
  getPartition() {
    return this.partition;
  }

  /**
   * @returns {boolean}
   */
  hasSubPartition() {
    return this.subPartition !== null;
  }

  /**
   * @returns {?string}
   */
  getSubPartition() {
    return this.subPartition;
  }

  /**
   * Creates a stream id from an sns topic string, assuming it was generated
   * by the "toSnsTopicName" method.
   *
   * @param {string} value
   *
   * @returns {StreamId}
   */
  static fromSnsTopicName(value) {
    return StreamId.fromString(value.replace(/__/g, ':').replace(/--/g, '.'));
  }

  /**
   * Returns a string that can be used for an AWS SNS Topic by replacing colons
   * with two underscores and periods with two hyphens.
   *
   * @returns {string}
   */
  toSnsTopicName() {
    return this.value.replace(/:/g, '__').replace(/\./g, '--');
  }

  /**
   * Creates a stream id from a file path, assuming it was generated by the "toFilePath" method.
   *
   * @param {string} value
   *
   * @return {StreamId}
   */
  static fromFilePath(value) {
    const parts = value.split('/');
    parts.splice(1, 2);
    return StreamId.fromString(parts.join(':'));
  }

  /**
   * Returns a string that can be used for a file path by replacing colons with a slash
   * and producing a hash of the partition (if it exists).
   *
   * @returns {string}
   */
  toFilePath() {
    if (!this.hasPartition()) {
      return this.value.replace(/:/g, '/');
    }

    const hash = md5(this.partition);
    const str = `${this.topic}/${hash.substr(0, 2)}/${hash.substr(2, 2)}/${this.partition}/${this.subPartition || ''}`;
    return trim(str, '/');
  }
}
