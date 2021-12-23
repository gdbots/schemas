import test from 'tape';
import AssertionFailed from '@gdbots/pbj/exceptions/AssertionFailed.js';
import EdgeId from '@gdbots/schemas/gdbots/ncr/EdgeId.js';
import NodeRef from '@gdbots/pbj/well-known/NodeRef.js';
import SampleEdge from './fixtures/SampleEdge.js';


test('EdgeId tests', (t) => {
  const edge = SampleEdge.create()
    .set('from_ref', NodeRef.fromString('acme:article:123'))
    .set('to_ref', NodeRef.fromString('acme:video:abc'));
  const id = EdgeId.fromEdge(edge);
  const expected = 'ef510a74-6c90-5441-9fff-b9d6a6569cda';

  t.true(id instanceof EdgeId);
  t.true(id.equals(EdgeId.fromString(`${id}`)));
  t.same(`${id}`, expected);
  t.same(`${EdgeId.fromString(id.toString())}`, expected);

  try {
    id.test = 1;
    t.fail('id instance is mutable');
  } catch (e) {
    t.pass('id instance is immutable');
  }

  t.end();
});


test('EdgeId invalid tests', (t) => {
  try {
    EdgeId.fromString('6c84fb90-12c4-11e1-840d-7b25c5ee775a');
    t.fail('EdgeId created with invalid uuid (v1).');
  } catch (e) {
    t.true(e instanceof AssertionFailed, 'Exception MUST be an instanceOf AssertionFailed');
    t.pass(e.message);
  }

  try {
    EdgeId.fromString('110ec58a-a0f2-4ac4-8393-c866d813b8d1');
    t.fail('EdgeId created with invalid uuid (v4).');
  } catch (e) {
    t.true(e instanceof AssertionFailed, 'Exception MUST be an instanceOf AssertionFailed');
    t.pass(e.message);
  }

  try {
    EdgeId.fromString('not a uuid at all');
    t.fail('EdgeId created with invalid string.');
  } catch (e) {
    t.true(e instanceof AssertionFailed, 'Exception MUST be an instanceOf AssertionFailed');
    t.pass(e.message);
  }

  t.end();
});
