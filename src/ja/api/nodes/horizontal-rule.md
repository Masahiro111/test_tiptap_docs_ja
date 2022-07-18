---
description: Separate what needs to be separated, but use it wisely.
icon: separator
---

# HorizontalRule
[![Version](https://img.shields.io/npm/v/@tiptap/extension-horizontal-rule.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-horizontal-rule)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-horizontal-rule.svg)](https://npmcharts.com/compare/@tiptap/extension-horizontal-rule?minimal=true)

<!-- Use this extension to render a `<hr>` HTML tag. If you pass `<hr>` in the editor’s initial content, it’ll be rendered accordingly. -->

<!-- Type three dashes (<code>---</code>) or three underscores and a space (<code>___ </code>) at the beginning of a new line and it will magically transform to a horizontal rule. -->

この拡張機能を使用して、`<hr>` HTML タグをレンダリングします。エディタの最初のコンテンツで `<hr>` を渡すと、それに応じてレンダリングされます。

新しい行の先頭に3つのダッシュ (<code>---</code>) または3つのアンダースコアとスペース (<code>___ </code>) を入力すると、魔法のように水平方向のルールに変換されます。

## インストール
```bash
npm install @tiptap/extension-horizontal-rule
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
HorizontalRule.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setHorizontalRule()
<!-- Create a horizontal rule. -->

水平ルールを作成します。

```js
editor.commands.setHorizontalRule()
```

## ソースコード
[packages/extension-horizontal-rule/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-horizontal-rule/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/HorizontalRule
