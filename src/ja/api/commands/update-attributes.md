# updateAttributes

<!-- The `updateAttributes` command sets attributes of a node or mark to new values. Not passed attributes won’t be touched. -->

`updateAttributes` コマンドは、ノードまたはマークの属性を新しい値に設定します。 渡されなかった属性は変更されません。

参照 : [extendMarkRange](/api/commands/extend-mark-range)

## パラメーター

`typeOrName: string | NodeType | MarkType`

<!-- Pass the type you want to update, for example `'heading'`. -->

更新するタイプを渡します（例： `'heading'`）。

`attributes: Record<string, any>`

<!-- This expects an object with the attributes that need to be updated. It doesn’t need to have all attributes. -->

これは、更新する必要のある属性を持つオブジェクトを想定しています。 すべての属性を持っている必要はありません。

## 使い方

```js
// Update node attributes
editor.commands.updateAttributes('heading', { level: 1 })

// Update mark attributes
editor.commands.updateAttributes('highlight', { color: 'pink' })
```

