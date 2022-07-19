# はじめに

<!-- tiptap is a friendly wrapper around [ProseMirror](https://ProseMirror.net). Although Tiptap tries to hide most of the complexity of ProseMirror, it’s built on top of its APIs and we recommend you to read through the [ProseMirror Guide](https://ProseMirror.net/docs/guide/) for advanced usage. -->

Tiptap は、[ProseMirror](https://ProseMirror.net) のフレンドリーなラッパーです。 Tiptap は ProseMirror の複雑さのほとんどを隠そうとしますが、API の上に構築されているため、高度な使用法については [ProseMirror ガイド](https://ProseMirror.net/docs/guide/) を読むことをお勧めします。

### 構造

ProseMirror は、ドキュメントの許可された構造を定義する厳密な [Schema](/api/schema) で動作します。ドキュメントは、見出し、段落、その他の要素のツリー、いわゆるノードです。マークはノードに付けることができます。 g。その一部を強調します。[Commands](/api/commands) プログラムでそのドキュメントを変更します。

<!-- ProseMirror works with a strict [Schema](/api/schema), which defines the allowed structure of a document. A document is a tree of headings, paragraphs and others elements, so called nodes. Marks can be attached to a node, e. g. to emphasize part of it. [Commands](/api/commands) change that document programmatically. -->

### コンテンツ

ドキュメントは状態で保存されます。すべての変更は、トランザクションとして状態に適用されます。状態には、現在のコンテンツ、カーソル位置、および選択に関する詳細が含まれます。いくつかの異なる [events](/api/events) にフックして、たとえば、トランザクションが適用される前にトランザクションを変更することができます。

<!-- The document is stored in a state. All changes are applied as transactions to the state. The state has details about the current content, cursor position and selection. You can hook into a few different [events](/api/events), for example to alter transactions before they get applied. -->

### 拡張機能

拡張機能は、[nodes](/api/nodes)、[marks](/api/marks) または [functionalities](/api/extensions) をエディターに追加します。これらの拡張機能の多くは、コマンドを一般的な[キーボードショートカット](/api/keyboard-shortcuts) にバインドしていました。

<!-- Extensions add [nodes](/api/nodes), [marks](/api/marks) and/or [functionalities](/api/extensions) to the editor. A lot of those extensions bound their commands to common [keyboard shortcuts](/api/keyboard-shortcuts). -->

## 用語

ProseMirror には独自の語彙があり、時々それらすべての単語に出くわします。これは、ドキュメントで使用する最も一般的な単語の概要です。

<!-- ProseMirror has its own vocabulary and you’ll stumble upon all those words now and then. Here is a short overview of the most common words we use in the documentation. -->

| 用語        | 説明                                                              |
| ----------- | ------------------------------------------------------------------------ |
| Schema      | コンテンツが持つことができる構造を構成 |
| Document    | ドキュメント|エディターの実際のコンテンツ |
| State       | 現在のコンテンツとエディターの選択を説明するためのすべて |
| Transaction | 状態の変更（更新された選択、コンテンツなど） |
| Extension   | 新しい機能を登録 |
| Node        | 見出しや段落などのコンテンツのタイプ |
| Mark        | インラインフォーマットなどのノードに適用 |
| Command     | エディター内でアクションを実行すると、どういうわけか状態が変わる |
| Decoration  | 例として、間違いを強調するためにドキュメントの上にスタイリング |

