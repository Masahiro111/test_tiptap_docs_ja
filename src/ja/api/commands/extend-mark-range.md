# extendMarkRange

The `extendMarkRange` command expands the current selection to encompass the current mark. If the current selection doesn’t have the specified mark, nothing changes.

`extendMarkRange` コマンドは、現在の選択範囲を拡張して、現在のマークを包含します。 現在の選択に指定されたマークがない場合、何も変更されません。

## パラメータ

`typeOrName: string | MarkType`

マークの名前、またはタイプ。

`attributes?: Record<string, any>`

<!-- Optionally, you can specify attributes that the extented mark must contain. -->

オプションで、拡張マークに含める必要のある属性を指定できます。

## 使い方

```js
// Expand selection to link marks
editor.commands.extendMarkRange('link')

// Expand selection to link marks with specific attributes
editor.commands.extendMarkRange('link', { href: 'https://google.com' })

// Expand selection to link mark and update attributes
editor
  .chain()
  .extendMarkRange('link')
  .updateAttributes('link', {
    href: 'https://duckduckgo.com'
  })
  .run()
```
