# setContent

<!-- The `setContent` command replaces the document with a new one. You can pass JSON or HTML, both work fine. It’s basically the same as setting the `content` on initialization. -->

`setContent` コマンドは、ドキュメントを新しいものに置き換えます。 JSON または HTML を渡すことができ、どちらも正常に機能します。基本的には、初期化時に「コンテンツ」を設定するのと同じです。

参照 : [insertContent](/api/commands/insert-content), [clearContent](/api/commands/clear-content)

## パラメータ

`content: string`

<!-- Pass a string (JSON or HTML) as [content](/guide/output). The editor will only render what’s allowed according to the [schema](/api/schema). -->

文字列（JSONまたはHTML）を [content](/api/schema) として渡します。エディターは、[schema](/api/schema) に従って許可されているもののみをレンダリングします。

`emitUpdate?: Boolean (false)`

<!-- By default, it doesn’t trigger the update event. Passing `true` doesn’t prevent triggering the update event. -->

デフォルトでは、更新イベントはトリガーされません。`true` を渡しても、更新イベントのトリガーは妨げられません。

`parseOptions?: Record<string, any>`

<!-- Options to configure the parsing can be passed during initialization and/or with setContent. Read more about parseOptions in the [ProseMirror documentation](https://prosemirror.net/docs/ref/#model.ParseOptions). -->

解析を構成するためのオプションは、初期化中および / または setContent を使用して渡すことができます。 parseOptions の詳細については、[ProseMirrorドキュメント](https://prosemirror.net/docs/ref/#model.ParseOptions) を参照してください。

## 使い方

```js
// HTML
editor.commands.setContent('<p>Example Text</p>')

// JSON
editor.commands.setContent({
  "type": "doc",
  "content": [
    {
      "type": "paragraph",
      "content": [
        {
          "type": "text",
          "text": "Example Text"
        }
      ]
    }
  ]
})
```

