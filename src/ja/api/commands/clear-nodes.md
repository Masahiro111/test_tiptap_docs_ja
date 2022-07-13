# clearNodes

`clearNodes` コマンドは、ノードをデフォルトノード（デフォルトでは段落）に正規化します。 あらゆる種類のリストを正規化することもできます。 高度なユースケースでは、新しいノードタイプを適用する前に便利です。

デフォルトノードをどのように定義できるか疑問に思われる場合：[`Document`](/api/nodes/document) の `content` 属性の内容によって異なりますが、デフォルトでは `block+`（少なくとも1つのブロックノード）です。[`Paragraph`](/api/nodes/paragraph) ノードの優先度が最も高いため、最初に読み込まれるため、デフォルトのノードになります。

<!-- The `clearNodes` command normalizes nodes to the default node, which is the paragraph by default. It’ll even normalize all kind of lists. For advanced use cases it can come in handy, before applying a new node type. -->

<!-- If you wonder how you can define the default node: It depends on what’s in the `content` attribute of your [`Document`](/api/nodes/document), by default that’s `block+` (at least one block node) and the [`Paragraph`](/api/nodes/paragraph) node has the highest priority, so it’s loaded first and is therefore the default node. -->

## 使い方

```js
editor.commands.clearNodes()
```

