---
description: The typography smart ass for your editor, replaces everything that’s wrong.
icon: quill-pen-line
---

# タイポグラフィ

[![Version](https://img.shields.io/npm/v/@tiptap/extension-typography.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-typography)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-typography.svg)](https://npmcharts.com/compare/@tiptap/extension-typography?minimal=true)

<!-- This extension tries to help with common text patterns with the correct typographic character. Under the hood all rules are input rules. -->

この拡張機能は、正しい活版印刷文字を使用した一般的なテキストパターンを支援しようとします。内部的には、すべてのルールは入力ルールです。

## インストール

```bash
npm install @tiptap/extension-typography
```

## ルール

| 名前 | 説明 |
| --- | --- |
| emDash | 二重ダッシュ `--` を emdash `—` に変換 |
| ellipsis | 3つのドット `...` を省略記号 `…` に変換 |
| openDoubleQuote     | 二重引用符で始める |
| closeDoubleQuote    | 二重引用符で閉じる |
| openSingleQuote     | 一重引用符で始める |
| closeSingleQuote    | 一重引用符で閉じる |
| leftArrow           | `<-` を矢印`←`に変換 |
| rightArrow          | `->` 矢印`→`に変換 |
| copyright           | `(c)` を著作権記号 `©` に変換 |
| registeredTrademark | `(r)` を登録商標記号 `®` に変換 |
| trademark           | `(tm)` を登録商標記号 `™` に変換 |
| oneHalf             | `1/2` を `½` に変換 |
| oneQuarter          | `1/4` を `¼` に変換 |
| threeQuarters       | `3/4` を`¾` に変換 |
| plusMinus           | `+/-` を `±` に変換 |
| notEqual            | `!=` を `≠` に変換 |
| laquo               | `<<` を `«` に変換 |
| raquo               | `>>` を `»` に変換 |
| multiplication  | `2 * 3` または `2x3` を `2×3` に変換 |
| superscriptTwo      | `^2` を `²` に変換 |
| superscriptThree    | `^3` を `³` に変換 |

## キーボード ショートカット

| コマンド         | Windows/Linux | macOS       |
| --------------- | ------------- | ----------- |
| undoInputRule() | `Backspace`   | `Backspace` |

## ソースコード

[packages/extension-typography/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-typography/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Typography

### ルールの無効化

<!-- You can configure the included rules, or even disable a few of them, like shown below. -->

以下に示すように、含まれているルールを構成したり、いくつかのルールを無効にしたりすることもできます。

```js
import { Editor } from '@tiptap/core'
import Typography from '@tiptap/extension-typography'

const editor = new Editor({
  extensions: [
    // Disable some included rules
    Typography.configure({
      oneHalf: false,
      oneQuarter: false,
      threeQuarters: false,
    }),
  ],
})
```
