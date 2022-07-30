---
description: The gapcursor makes sure the cursor doesn’t get stuck … in a gap.
icon: space
---

# Gapcursor

[![Version](https://img.shields.io/npm/v/@tiptap/extension-gapcursor.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-gapcursor)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-gapcursor.svg)](https://npmcharts.com/compare/@tiptap/extension-gapcursor?minimal=true)

<!-- This extension loads the [ProseMirror Gapcursor plugin](https://github.com/ProseMirror/prosemirror-gapcursor) by Marijn Haverbeke, which adds a gap for the cursor in places that don’t allow regular selection. For example, after a table at the end of a document. -->

<!-- Note that Tiptap is headless, but the gapcursor needs CSS for its appearance. The [default CSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts) is loaded through the Editor class. -->

この拡張機能は、Marijn Haverbeke による[ProseMirrorGapcursor プラグイン](https://github.com/ProseMirror/prosemirror-gapcursor) をロードします。これにより、通常の選択ができない場所にカーソルのギャップが追加されます。たとえば、ドキュメントの最後にあるテーブルの後などです。

Tiptap はヘッドレスですが、gapcursor の外観には CSS が必要です。 [デフォルトのCSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts) は、Editor クラスを介して読み込まれます。

## インストール

```bash
npm install @tiptap/extension-gapcursor
```

## ソースコード

[packages/extension-gapcursor/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-gapcursor/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Gapcursor
