# clearContent

`clearContent` コマンドは現在のドキュメントを削除します。

エディターは構成されたスキーマを適用し、ドキュメントは「null」にならないことに注意してください。 デフォルトの [`Document`](/api/nodes/document) は、デフォルトで段落である少なくとも 1つのブロックノードを持つことを想定しています。 言い換えると、そのコマンドを実行した後でも、ドキュメントには少なくとも 1つの（空の）段落があります。

<!-- The `clearContent` command deletes the current document. -->

<!-- Keep in mind that the editor will enforce the configured schema, and the document won’t be `null`. The default [`Document`](/api/nodes/document) expects to have at least one block node, which is the paragraph by default. In other words: Even after running that command the document will have at least one (empty) paragraph. -->

参照 : [setContent](/api/commands/set-content), [insertContent](/api/commands/insert-content)

## パラメータ

`emitUpdate: boolean (false)`

<!-- By default, it doesn’t trigger the update event. Passing `true` doesn’t prevent triggering the update event. -->

デフォルトでは、更新イベントはトリガーされません。`true` を渡しても、更新イベントのトリガーは妨げられません。

## 使い方

```js
// Remove all content from the document
editor.commands.clearContent()

// Remove all content, and trigger the `update` event
editor.commands.clearContent(true)
```

