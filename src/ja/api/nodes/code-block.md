---
description: The least code the better, but sometimes you just need multiple lines.
icon: terminal-box-line
---

# CodeBlock
[![Version](https://img.shields.io/npm/v/@tiptap/extension-code-block.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-code-block)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-code-block.svg)](https://npmcharts.com/compare/@tiptap/extension-code-block?minimal=true)

<!-- With the CodeBlock extension you can add fenced code blocks to your documents. It’ll wrap the code in `<pre>` and `<code>` HTML tags. -->

<!-- Type <code>&grave;&grave;&grave;&nbsp;</code> (three backticks and a space) or <code>&Tilde;&Tilde;&Tilde;&nbsp;</code> (three tildes and a space) and a code block is instantly added for you. You can even specify the language, try writing <code>&grave;&grave;&grave;css&nbsp;</code>. That should add a `language-css` class to the `<code>`-tag. -->

<!-- ::: warning No syntax highlighting -->
<!-- The CodeBlock extension doesn’t come with styling and has no syntax highlighting built-in. Try the [CodeBlockLowlight](/api/nodes/code-block-lowlight) extension if you’re looking for code blocks with syntax highlighting. -->
<!-- ::: -->

CodeBlock 拡張機能を使用すると、フェンスで囲まれたコードブロックをドキュメントに追加できます。コードを `<pre>` および `<code>` HTML タグでラップします。

<code>&grave;&grave;&grave;&nbsp;</code>（3つのチルダとスペース）または <code>&Tilde;&Tilde;&Tilde;&nbsp;</code>（3つのチルダとスペース）とコードブロックを入力しますすぐに追加されます。言語を指定することもできます。<code>&grave;&grave;&grave;css&nbsp;</code> を書いてみてください。これにより、`language-css`クラスが `<code>` タグに追加されます。

> 警告：**構文の強調表示なし**
CodeBlock 拡張機能にはスタイリングが付属しておらず、構文の強調表示も組み込まれていません。構文が強調表示されたコードブロックを探している場合は、[CodeBlockLowlight](/api/nodes/code-block-lowlight) 拡張機能を試してください。

## インストール
```bash
npm install @tiptap/extension-code-block
```

## 設定

### languageClassPrefix
<!-- Adds a prefix to language classes that are applied to code tags. -->

コードタグに適用される言語クラスにプレフィックスを追加します。

Default: `'language-'`

```js
CodeBlock.configure({
  languageClassPrefix: 'language-',
})
```

### exitOnTripleEnter
<!-- Define whether the node should be exited on triple enter. -->

トリプルエンターでノードを終了するかどうかを定義します。

Default: `true`

```js
CodeBlock.configure({
  exitOnTripleEnter: false,
})
```

### exitOnArrowDown
<!-- Define whether the node should be exited on arrow down if there is no node after it. -->

後にノードがない場合に、下向き矢印でノードを終了するかどうかを定義します。

Default: `true`

```js
CodeBlock.configure({
  exitOnArrowDown: false,
})
```

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
CodeBlock.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setCodeBlock()
<!-- Wrap content in a code block. -->

コンテンツをコードブロックでラップします。

```js
editor.commands.setCodeBlock()
```

### toggleCodeBlock()
<!-- Toggle the code block. -->

コードブロックを切り替えます。

```js
editor.commands.toggleCodeBlock()
```

## キーボードショートカット
| コマンド         | Windows/Linux                 | macOS                     |
| --------------- | ----------------------------- | ------------------------- |
| toggleCodeBlock | `Control`&nbsp;`Alt`&nbsp;`C` | `Cmd`&nbsp;`Alt`&nbsp;`C` |

## ソースコード
[packages/extension-code-block/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-code-block/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/CodeBlock
