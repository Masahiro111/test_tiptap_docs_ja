# toggleWrap

<!-- `toggleWrap` wraps the current node with a new node or removes a wrapping node. -->

`toggleWrap`は、現在のノードを新しいノードでラップするか、ラップしているノードを削除します。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of node that should be used for the wrapping node. -->

ラッピングノードに使用する必要があるノードのタイプ。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the node. **This is optional.** -->

ノードに適用する必要がある属性。**これはオプションです。**

## 使い方

```js
// toggle wrap the current selection with a heading node
editor.commands.toggleWrap('heading', { level: 1 })
```
