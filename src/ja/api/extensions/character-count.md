---
description: Limit the number of characters in your editor, or at least count them.
icon: calculator-line
---

# 文字カウント

[![Version](https://img.shields.io/npm/v/@tiptap/extension-character-count.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-character-count)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-character-count.svg)](https://npmcharts.com/compare/@tiptap/extension-character-count?minimal=true)

<!-- The `CharacterCount` extension limits the number of allowed character to a specific length. That’s it, that’s all. -->

`CharacterCount`拡張機能は、許可される文字数を特定の長さに制限します。

## インストール

```bash
npm install @tiptap/extension-character-count
```

## 設定

### 制限

<!-- The maximum number of characters that should be allowed. -->

許可する必要のある最大文字数。

Default: `null`

```js
CharacterCount.configure({
  limit: 240,
})
```

### モード

<!-- The mode by which the size is calculated. -->

サイズが計算されるモード。

Default: `'textSize'`

```js
CharacterCount.configure({
  mode: 'nodeSize',
})
```

## ストレージ

### characters()

<!-- Get the number of characters for the current document. -->

現在のドキュメントの文字数を取得します。

```js
editor.storage.characterCount.characters()

// Get the size of a specific node.
editor.storage.characterCount.characters({ node: someCustomNode })

// Overwrite the default `mode`.
editor.storage.characterCount.characters({ mode: 'nodeSize' })
```

### words()

<!-- Get the number of words for the current document. -->

現在のドキュメントの単語数を取得します。

```js
editor.storage.characterCount.words()

// Get the number of words for a specific node.
editor.storage.characterCount.words({ node: someCustomNode })
```

## ソースコード

[packages/extension-character-count/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-character-count/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/CharacterCount
