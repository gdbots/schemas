import test from 'tape';
import AssertionFailed from '@gdbots/pbj/exceptions/AssertionFailed';
import StreamId from '@gdbots/schemas/gdbots/pbjx/StreamId';

test('StreamId topic tests', (t) => {
  const id = StreamId.fromString('health-checks');
  t.true(id instanceof StreamId);
  t.true(id.equals(StreamId.fromString(`${id}`)));
  t.same(id.getTopic(), 'health-checks');
  t.false(id.hasPartition());
  t.true(id.getPartition() === null);
  t.false(id.hasSubPartition());
  t.true(id.getSubPartition() === null);

  try {
    id.test = 1;
    t.fail('id instance is mutable');
  } catch (e) {
    t.pass('id instance is immutable');
  }

  try {
    StreamId.fromString('a'.repeat(256));
    t.fail('created invalid StreamId (too long)');
  } catch (e) {
    t.pass('unable to create invalid StreamId (too long)');
  }

  t.end();
});


test('StreamId partition tests', (t) => {
  const id = StreamId.fromString('bank-account:homer-simpson');
  t.true(id instanceof StreamId);
  t.true(id.equals(StreamId.fromString(`${id}`)));
  t.same(id.getTopic(), 'bank-account');
  t.true(id.hasPartition());
  t.same(id.getPartition(), 'homer-simpson');
  t.false(id.hasSubPartition());
  t.true(id.getSubPartition() === null);
  t.end();
});


test('StreamId all parts tests', (t) => {
  const id = StreamId.fromString('poll.votes:batman-vs-superman:20160301.c2');
  t.true(id instanceof StreamId);
  t.true(id.equals(StreamId.fromString(`${id}`)));
  t.same(id.getTopic(), 'poll.votes');
  t.true(id.hasPartition());
  t.same(id.getPartition(), 'batman-vs-superman');
  t.true(id.hasSubPartition());
  t.same(id.getSubPartition(), '20160301.c2');
  t.end();
});


test('StreamId case sensitive tests', (t) => {
  const id = StreamId.fromString('My-Topic:IS_COOL:BR0.T33n');
  t.true(id instanceof StreamId);
  t.true(id.equals(StreamId.fromString(`${id}`)));
  t.same(id.getTopic(), 'My-Topic');
  t.true(id.hasPartition());
  t.same(id.getPartition(), 'IS_COOL');
  t.true(id.hasSubPartition());
  t.same(id.getSubPartition(), 'BR0.T33n');
  t.end();
});


test('StreamId toSnsTopicName tests', (t) => {
  const id = StreamId.fromString('My-Topic:IS_COOL:BR0.T33n');
  t.same(id.toSnsTopicName(), 'My-Topic__IS_COOL__BR0--T33n');
  t.true(id.equals(StreamId.fromSnsTopicName(id.toSnsTopicName())));
  t.end();
});


test('StreamId toFilePath tests', (t) => {
  let id = StreamId.fromString('My-Topic:IS_COOL:BR0.T33n');
  t.same(id.toFilePath(), 'My-Topic/8a/9f/IS_COOL/BR0.T33n');
  t.true(id.equals(StreamId.fromFilePath(id.toFilePath())));

  id = StreamId.fromString('My-Topic:IS_COOL');
  t.same(id.toFilePath(), 'My-Topic/8a/9f/IS_COOL');
  t.true(id.equals(StreamId.fromFilePath(id.toFilePath())));

  id = StreamId.fromString('My-Topic');
  t.same(id.toFilePath(), 'My-Topic');
  t.true(id.equals(StreamId.fromFilePath(id.toFilePath())));

  id = StreamId.fromString('My-Topic:IS_COOL:0');
  t.same(id.toFilePath(), 'My-Topic/8a/9f/IS_COOL/0');
  t.true(id.equals(StreamId.fromFilePath(id.toFilePath())));

  t.end();
});


test('StreamId invalid tests', (t) => {
  const invalid = [
    'test::what',
    'test::',
    'test:::',
    ':test',
    'john@doe.com',
    '#hashtag',
    'http://www.what.com/',
    'test.value:2015/01/01/test:what',
    'cool~topic',
    'some:thin!@##$%$%&^^&**()-=+',
    'some:test%20',
  ];

  invalid.forEach((v) => {
    try {
      StreamId.fromString(v);
      t.fail(`StreamId created with invalid value [${v}]`);
    } catch (e) {
      t.true(e instanceof AssertionFailed, 'Exception MUST be an instanceOf AssertionFailed');
      t.pass(e.message);
    }
  });

  t.end();
});
