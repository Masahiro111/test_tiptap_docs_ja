---
description: Sometimes we all need a break, even if it’s just a line break.
icon: text-wrap
---

# HardBreak
[![Version](https://img.shields.io/npm/v/@tiptap/extension-hard-break.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-hard-break)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-hard-break.svg)](https://npmcharts.com/compare/@tiptap/extension-hard-break?minimal=true)

<!-- The HardBreak extensions adds support for the `<br>` HTML tag, which forces a line break. -->

HardBreak 拡張機能は、改行を強制する `<br>` HTML タグのサポートを追加します。

## インストール
```bash
npm install @tiptap/extension-hard-break
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
HardBreak.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### keepMarks
<!-- Decides whether to keep marks after a line break. Based on the `keepOnSplit` option for marks. -->

改行後にマークを保持するかどうかを決定します。マークの `keepOnSplit` オプションに基づいています。

Default: `true`

```js
HardBreak.configure({
  keepMarks: false,
})
```

## コマンド

### setHardBreak()
<!-- Add a line break. -->

改行を追加します

```js
editor.commands.setHardBreak()
```

## キーボードショートカット
| コマンド      | Windows/Linux                                  | macOS                                      |
| ------------ | ---------------------------------------------- | ------------------------------------------ |
| setHardBreak | `Shift` + `Enter`<br>`Control` + `Enter` | `Shift` + `Enter`<br>`Cmd` + `Enter` |

## ソースコード
[packages/extension-hard-break/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-hard-break/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/HardBreak
