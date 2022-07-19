# Suggestion
[![Version](https://img.shields.io/npm/v/@tiptap/suggestion.svg?label=version)](https://www.npmjs.com/package/@tiptap/suggestion)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/suggestion.svg)](https://npmcharts.com/compare/@tiptap/suggestion?minimal=true)

<!-- This utility helps with all kinds of suggestions in the editor. Have a look at the [`Mention`](/api/nodes/mention), [`Hashtag`](/api/nodes/hashtag) or [`Emoji`](/api/nodes/emoji) node to see it in action. -->

このユーティリティは、エディタでのあらゆる種類の提案に役立ちます。 [`Mention`](/api/nodes/mention)、 [`Hashtag`](/api/nodes/hashtag) または [`Emoji`](/api/nodes/emoji) ノードを見てください動作中。

## 設定

### char
<!-- The character that triggers the autocomplete popup. -->

オートコンプリートポップアップをトリガーする文字。

Default: `'@'`

### pluginKey
<!-- ProseMirror PluginKey. -->

ProseMirror の プラグインキー。

Default: `SuggestionPluginKey`

### allowSpaces
<!-- Allows or disallows spaces in suggested items. -->

提案されたアイテムのスペースを許可または禁止します。

Default: `false`

### allowedPrefixes
<!-- The prefix characters that are allowed to trigger a suggestion. Set to `null` to allow any prefix character. -->

提案をトリガーできるプレフィックス文字。 `null` に設定すると、任意のプレフィックス文字が許可されます。

Default: `[' ']`

### startOfLine
<!-- Trigger the autocomplete popup at the start of a line only. -->

行の先頭でのみオートコンプリートポップアップをトリガーします。

Default: `false`

### decorationTag
<!-- The HTML tag that should be rendered for the suggestion. -->

提案のためにレンダリングする必要のある HTML タグ。

Default: `'span'`

### decorationClass
<!-- A CSS class that should be added to the suggestion. -->

提案に追加する必要がある CSS クラス。

Default: `'suggestion'`

### command
<!-- Executed when a suggestion is selected. -->

提案が選択されたときに実行されます。

Default: `() => {}'`

### items
<!-- Pass an array of filtered suggestions, can be async. -->

フィルタリングされた提案の配列を渡します。非同期にすることができます。

Default: `({ editor, query }) => []`

### render
<!-- A render function for the autocomplete popup. -->

オートコンプリートポップアップのレンダリング機能。

Default: `() => ({})`


## ソースコード
[packages/suggestion/](https://github.com/ueberdosis/tiptap/blob/main/packages/suggestion/)

