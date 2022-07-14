---
tableOfContents: true
---

# 例

## はじめに

<!-- Node views enable you to fully customize your nodes. We are collecting a few different examples here. Feel free to copy them and start building on them. -->

<!-- Keep in mind that those are just examples to get you started, not officially supported extensions. We don’t have tests for them, and don’t plan to maintain them with the same attention as we do with official extensions. -->

ノードビューを使用すると、ノードを完全にカスタマイズできます。ここでは、いくつかの異なる例を収集しています。それらを自由にコピーして、それらの上に構築を開始してください。

これらは開始するための単なる例であり、公式にサポートされている拡張機能ではないことに注意してください。それらのテストはありません。また、公式の拡張機能と同じように注意を払って維持する予定もありません。

## ドラッグの取り扱い

<!-- Drag handles aren’t that easy to add. We are still on the lookout what’s the best way to add them. Official support will come at some point, but there’s no timeline yet. -->

ドラッグの取り扱いを追加するのはそれほど簡単ではありません。それらを追加するための最良の方法は、まだ検討中です。公式サポートはいつか来る予定ですが、まだタイムラインはありません。

https://embed.tiptap.dev/preview/GuideNodeViews/DragHandle

## 目次

<!-- This one loops through the editor content, gives all headings an ID and renders a Table of Contents with Vue. -->

これはエディターのコンテンツをループし、すべての見出しに ID を与え、Vue を使用して目次をレンダリングします。

https://embed.tiptap.dev/preview/GuideNodeViews/TableOfContents

## エディターでの描画

描画例は、エディター内での描画を可能にする SVG を示しています。

<!-- The drawing example shows a SVG that enables you to draw inside the editor. -->

https://embed.tiptap.dev/preview/Examples/Drawing

<!-- It’s not working very well with the Collaboration extension. It’s sending all data on every change, which can get pretty huge with Y.js. If you plan to use those two in combination, you need to improve it or your WebSocket backend will melt. -->

コラボレーション拡張機能ではうまく機能していません。すべての変更についてすべてのデータを送信しますが、Y.js ではかなり大きくなる可能性があります。これら 2つを組み合わせて使用​​する場合は、改善する必要があります。そうしないと、WebSocket バックエンドが溶けてしまいます。
