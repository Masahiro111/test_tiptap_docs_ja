# forEach

<!-- Loop through an array of items. -->

アイテムの配列をループします。

## パラメータ

`items: any[]`

<!-- An array of items. -->

アイテムの配列。

`fn: (item: any, props: CommandProps & { index: number }) => boolean`

<!-- A function to do anything with your item. -->

あなたのアイテムで何でもする機能。

## 使い方

```js
const items = ['foo', 'bar', 'baz']

editor.commands.forEach(items, (item, { commands }) => {
  return commands.insertContent(item)
})
```
