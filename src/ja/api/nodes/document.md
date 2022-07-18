---
description: "Everyone needs it, nobody talks about it: the Document extension."
icon: file-line
---

# Document
[![Version](https://img.shields.io/npm/v/@tiptap/extension-document.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-document)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-document.svg)](https://npmcharts.com/compare/@tiptap/extension-document?minimal=true)

<!-- **The `Document` extension is required**, no matter what you build with Tiptap. It’s a so called “topNode”, a node that’s the home to all other nodes. Think of it like the `<body>` tag for your document. -->

<!-- The node is very tiny though. It defines a name of the node (`doc`), is configured to be a top node (`topNode: true`) and that it can contain multiple other nodes (`block+`). That’s all. But have a look yourself: -->

<!-- :::warning Breaking Change from 1.x → 2.x
tiptap 1 tried to hide that node from you, but it has always been there. You have to explicitly import it from now on (or use `StarterKit`).
::: -->

**Tiptap で何をビルドするかに関係なく、Document 拡張機能が必要です**。これはいわゆる "topNode" であり、他のすべてのノードのホームとなるノードです。ドキュメントの `<body>` タグのように考えてください。

ただし、ノードは非常に小さいです。ノードの名前 (`doc`) を定義し、最上位ノード (`topNode: true`) として構成され、他の複数のノード (`block+`) を含めることができます。

> 警告：**1.x→2.xからの重大な変更**
Tiptap 1はそのノードをあなたから隠そうとしましたが、それは常にそこにありました。今後は明示的にインポートする必要があります（または `StarterKit` を使用します）。

## インストール
```bash
npm install @tiptap/extension-document
```

## ソースコード
[packages/extension-document/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-document/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Document
