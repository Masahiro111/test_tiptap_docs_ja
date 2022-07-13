# insertContentAt

<!-- The `insertContentAt` will insert a string of html or a node at a given position or range. If a range is given, the new content will replace the content in the given range with the new content. -->

`insertContentAt` は、指定された位置または範囲に html の文字列またはノードを挿入します。 範囲が指定されている場合、新しいコンテンツは指定された範囲のコンテンツを新しいコンテンツに置き換えます。

## パラメータ

`position: number | Range`

<!-- The position or range the content will be inserted in. -->

コンテンツが挿入される位置または範囲。

`value: Content`

<!-- The content to be inserted. Can be a string of HTML or a node. -->

挿入するコンテンツ。 HTMLの文字列またはノードにすることができます。

`options: Record<string, any>`

<!-- * updateSelection: controls if the selection should be moved to the newly inserted content.
* parseOptions: Passed content is parsed by ProseMirror. To hook into the parsing, you can pass `parseOptions` which are then handled by [ProseMirror](https://prosemirror.net/docs/ref/#model.ParseOptions). -->

* updateSelection：選択範囲を新しく挿入されたコンテンツに移動するかどうかを制御します。
* parseOptions：渡されたコンテンツはProseMirrorによって解析されます。 解析にフックするには、`parseOptions` を渡すことができます。これは、[ProseMirror](https://prosemirror.net/docs/ref/#model.ParseOptions) によって処理されます。

## 使い方

```js
editor.commands.insertContentAt(12, '<p>Hello world</p>', {
  updateSelection: true,
  parseOptions: {
    preserveWhitespace: 'full',
  }
})
```
