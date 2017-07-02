import test from 'tape';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import '@gdbots/schemas';

test('Can create all messages', (t) => {
  MessageResolver.all().forEach((classProto) => {
    const message = classProto.create();
    t.true(message instanceof Message, `Unable to create [${classProto.schema().getId()}]`);
  });

  t.end();
});
