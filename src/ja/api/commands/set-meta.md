# setMeta

<!-- Store a metadata property in the current transaction. -->

現在のトランザクションにメタデータプロパティを保存します。

## パラメーター

`key: string`

<!-- The name of your metadata. You can get its value at any time with [getMeta](https://prosemirror.net/docs/ref/#state.Transaction.getMeta). -->

メタデータの名前。[getMeta](https://prosemirror.net/docs/ref/#state.Transaction.getMeta) を使用すると、いつでもその値を取得できます。

`value: any`

<!-- Store any value within your metadata. -->

メタデータ内に任意の値を保存します。

## 使い方

```js
// Prevent the update event from being triggered
editor.commands.setMeta('preventUpdate', true)

// Store any value in the current transaction.
// You can get this value at any time with tr.getMeta('foo').
editor.commands.setMeta('foo', 'bar')
```
