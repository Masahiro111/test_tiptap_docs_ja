---
description: Write slightly above the normal line to show you’re just next level.
icon: superscript
---

# Superscript
[![Version](https://img.shields.io/npm/v/@tiptap/extension-superscript.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-superscript)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-superscript.svg)](https://npmcharts.com/compare/@tiptap/extension-superscript?minimal=true)

<!-- Use this extension to render text in <sup>superscript</sup>. If you pass `<sup>` or text with `vertical-align: super` as inline style in the editor’s initial content, both will be normalized to a `<sup>` HTML tag. -->

この拡張機能を使用して、<sup>上付き文字</sup> でテキストをレンダリングします。エディターの初期コンテンツでインラインスタイルとして `<sup>` または `vertical-align: super` を含むテキストを渡すと、両方とも `<sup>` HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-superscript
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Superscript.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setSuperscript()

<!-- Mark text as superscript. -->

テキストを上付き文字としてマークします。

```js
editor.commands.setSuperscript()
```

### toggleSuperscript()
<!-- Toggle superscript mark. -->

上付き文字マークを切り替えます。

```js
editor.commands.toggleSuperscript()
```

### unsetSuperscript()
<!-- Remove superscript mark. -->

上付き文字を削除します。

```js
editor.commands.unsetSuperscript()
```

## キーボード ショートカット

| コマンド             | Windows/Linux      | macOS          |
| ------------------- | ------------------ | -------------- |
| toggleSuperscript() | `Ctrl` + `.` | `Cmd` + `.` |

## ソースコード

[packages/extension-superscript/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-superscript/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Superscript
