---
description: Mom, look! I wrote a paragraph on the Internet.
icon: paragraph
---

# Paragraph
[![Version](https://img.shields.io/npm/v/@tiptap/extension-paragraph.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-paragraph)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-paragraph.svg)](https://npmcharts.com/compare/@tiptap/extension-paragraph?minimal=true)

<!-- Yes, the schema is very strict. Without this extension you won’t even be able to use paragraphs in the editor. -->

<!-- :::warning Breaking Change from 1.x → 2.x
tiptap 1 tried to hide that node from you, but it has always been there. You have to explicitly import it from now on (or use `StarterKit`).
::: -->

スキーマは非常に厳密です。この拡張機能がないと、エディターで段落を使用することもできません。

> 警告：**1.x→2.xからの重大な変更**
Tiptap 1 はそのノードをあなたから隠そうとしましたが、それは常にそこにありました。今後は明示的にインポートする必要があります（または `StarterKit` を使用します）。

## インストール
```bash
npm install @tiptap/extension-paragraph
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Paragraph.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setParagraph()
<!-- Transforms all selected nodes to paragraphs. -->

選択したすべてのノードを段落に変換します。

```js
editor.commands.setParagraph()
```

## ショートカットキー
| コマンド        | Windows/Linux                 | macOS                     |
| -------------- | ----------------------------- | ------------------------- |
| setParagraph() | `Control`&nbsp;`Alt`&nbsp;`0` | `Cmd`&nbsp;`Alt`&nbsp;`0` |

## ソースコード
[packages/extension-paragraph/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-paragraph/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Paragraph
