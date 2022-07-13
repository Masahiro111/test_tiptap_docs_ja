# lift

<!-- The `lift` command lifts a given node up into it's parent node. **Lifting** means, that the block will be moved to the parent of the block it is currently in. -->

`lift` コマンドは、特定のノードをその親ノードに持ち上げます。 **リフティング** は、ブロックが現在のブロックの親に移動されることを意味します。

## パラメータ

`typeOrName: String | NodeType`

<!-- The node that should be lifted. If the node is not found in the current selection, ignore the command. -->

持ち上げる必要のあるノード。 現在の選択でノードが見つからない場合は、コマンドを無視してください。

`attributes: Record<string, any>`

<!-- The attributes the node should have to be lifted. This is **optional**. -->

ノードを解除する必要がある属性。 これは **オプション** です。

## 使い方

```js
// lift any headline
editor.commands.lift('headline')

// lift only h2
editor.commands.lift('headline', { level: 2 })
```
