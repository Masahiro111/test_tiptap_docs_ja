# setNodeSelection

<!-- `setNodeSelection` creates a new NodeSelection at a given position. A node selection is a selection that points to a single node. [See more](https://prosemirror.net/docs/ref/#state.NodeSelection) -->

`setNodeSelection` は、指定された位置に新しい NodeSelection を作成します。 ノード選択は、単一のノードを指す選択です。 [もっと見る](https://prosemirror.net/docs/ref/#state.NodeSelection)

## パラメーター

`position: number`

<!-- The position the NodeSelection will be created at. -->

NodeSelection が作成される位置。

## 使い方

```js
editor.commands.setNodeSelection(10)
```
