# insertContent

<!-- The `insertContent` command adds the passed value to the document. -->

`insertContent`コマンドは、渡された値をドキュメントに追加します。

参照 : [setContent](/api/commands/set-content), [clearContent](/api/commands/clear-content)

## パラメーター

`value: Content`

<!-- The command is pretty flexible and takes plain text, HTML or even JSON as a value. -->

このコマンドは非常に柔軟性があり、プレーンテキスト、HTML、さらにはJSONを値として受け取ります。

## 使い方

```js
// Plain text
editor.commands.insertContent('Example Text')

// HTML
editor.commands.insertContent('<h1>Example Text</h1>')

// HTML with trim white space
editor.commands.insertContent('<h1>Example Text</h1>', 
{
  parseOptions: {
    preserveWhitespace: false,
  }
})

// JSON/Nodes
editor.commands.insertContent({
  type: 'heading',
  attrs: {
    level: 1,
  },
  content: [
    {
      type: 'text',
      text: 'Example Text',
    },
  ],
})

// Multiple nodes at once
editor.commands.insertContent([
  {
    type: 'paragraph',
    content: [
      {
        type: 'text',
        text: 'First paragraph',
      },
    ],
  },
  {
    type: 'paragraph',
    content: [
      {
        type: 'text',
        text: 'Second paragraph',
      },
    ],
  },
])
```

