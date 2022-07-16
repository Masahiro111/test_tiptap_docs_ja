# setNode

<!-- The `setNode` command will replace a given range with a given node. The range depends on the current selection. **Important**: Currently `setNode` only supports text block nodes. -->

`setNode` コマンドは、指定された範囲を指定されたノードに置き換えます。 範囲は現在の選択によって異なります。 **重要**：現在、`setNode` はテキストブロックノードのみをサポートしています。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of the node that will replace the range. Can be a string or a NodeType. -->

範囲を置き換えるノードのタイプ。 文字列または NodeType にすることができます。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the node. **This is optional.** -->

ノードに適用する必要がある属性。 **これはオプションです。**

## 使い方

```js
editor.commands.setNode("paragraph", { id: "paragraph-01" })
```
