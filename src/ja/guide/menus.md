---
tableOfContents: true
---

# メニューの作成する

## はじめに

Tiptap は非常に生々しいものですが、それは良いことです。あなたはそれの外観について完全に制御できます。

フルコントロールとは、それを意味します。自分でメニューを作成することができます（そして作成する必要があります）。私たちはあなたがすべてを配線するのを手伝います。

<!-- tiptap comes very raw, but that’s a good thing. You have full control about the appearance of it. -->

<!-- When we say full control, we mean it. You can (and have to) build a menu on your own. We help you to wire everything up. -->

## メニュー

エディターは、コマンドをトリガーしてアクティブ状態を追加するための流暢な API を提供します。好きなマークアップを使用できます。メニューの配置を簡単にするために、いくつかのユーティリティとコンポーネントを提供しています。最も一般的なユースケースを1つずつ見ていきましょう。

<!-- The editor provides a fluent API to trigger commands and add active states. You can use any markup you like. To make the positioning of menus easier, we provide a few utilities and components. Let’s go through the most typical use cases one by one. -->

### 固定メニュー

たとえばエディタの上にある固定メニューは、何でもかまいません。そのようなメニューは提供していません。いくつかの `<button>` を含む `<div>` を追加するだけです。これらのボタンが[コマンド](/api/commands) をトリガーする方法は、[以下で説明(explained below)](#actions) です。

<!-- A fixed menu, for example on top of the editor, can be anything. We don’t provide such menu. Just add a `<div>` with a few `<button>`s. How those buttons can trigger [commands](/api/commands) is [explained below](#actions). -->

### バブルメニュー

テキストを選択すると、[バブルメニュー](/api/extensions/bubble-menu)  が表示されます。マークアップとスタイリングは完全にあなた次第です。

<!-- The [bubble menu](/api/extensions/bubble-menu) appears when selecting text. Markup and styling is totally up to you. -->

https://embed.tiptap.dev/preview/Extensions/BubbleMenu?hideSource

### フローティングメニュー

[フローティングメニュー](/api/extensions/floating-menu)  が空の行に表示されます。マークアップとスタイリングは完全にあなた次第です。

<!-- The [floating menu](/api/extensions/floating-menu) appears in empty lines. Markup and styling is totally up to you. -->

https://embed.tiptap.dev/preview/Extensions/FloatingMenu?hideSource

### スラッシュコマンド（進行中の作業）

これはまだ公式の拡張機能ではありませんが、[スラッシュコマンドと呼ばれるものを追加するために使用できる実験があります](/experiments/commands) 。これにより、 `/` で新しい行を開始でき、追加するノードを選択するためのポップアップが表示されます。

<!-- It’s not an official extension yet, but [there’s an experiment you can use to add what we call slash commands](/experiments/commands). It allows you to start a new line with `/` and will bring up a popup to select which node should be added. -->

## ボタン

<!-- Okay, you’ve got your menu. But how do you wire things up? -->

さて、あなたはあなたのメニューを持っています。しかし、どのように物事を配線しますか？

### コマンド

<!-- You’ve got the editor running already and want to add your first button. You need a `<button>` HTML tag with a click handler. Depending on your setup, that can look like the following example: -->

エディターが既に実行されていて、最初のボタンを追加したいとします。クリックハンドラー付きの `<button>` HTML タグが必要です。設定によっては、次の例のようになります。

```html
<button onclick="editor.chain().focus().toggleBold().run()">
  Bold
</button>
```

<!-- Oh, that’s a long command, right? Actually, it’s a [chain of commands](/api/commands#chain-commands). Let’s go through this one by one: -->

少し長い命令でしたか？実際には、[コマンドのチェーン](/api/commands#chain-commands) です。これを1つずつ見ていきましょう。

```js
editor.chain().focus().toggleBold().run()
```

<!-- 1. `editor` should be a Tiptap instance,
2. `chain()` is used to tell the editor you want to execute multiple commands,
3. `focus()` sets the focus back to the editor,
4. `toggleBold()` marks the selected text bold, or removes the bold mark from the text selection if it’s already applied and
5. `run()` will execute the chain. -->

1. `editor` は Tiptap インスタンスである必要があります。
2. `chain()` は 複数のコマンドを実行することをエディターに通知するために使用されます。
3. `focus()` は フォーカスをエディターに戻します。
4. `toggleBold()`は 選択したテキストを太字でマークします。すでに適用されている場合は、テキスト選択から太字のマークを削除します。
5. `run()` は チェーンを実行します。

言い換えると、これはテキストエディタの典型的な **太字** ボタンになります。

使用できるコマンドは、エディターに登録した拡張機能によって異なります。ほとんどの拡張機能には、 `set…()`、 `unset…()`、および `toggle…()`コマンドが付属しています。拡張機能のドキュメントを読んで、実際に利用できるものを確認するか、コードエディタのオートコンプリートを確認してください。

<!-- In other words: This will be a typical **Bold** button for your text editor. -->

<!-- Which commands are available depends on what extensions you have registered with the editor. Most extensions come with a `set…()`, `unset…()` and `toggle…()` command. Read the extension documentation to see what’s actually available or just surf through your code editor’s autocomplete. -->

### フォーカスを維持

上記の例では、すでに `focus()` コマンドを見てきました。ボタンをクリックすると、ブラウザはそのDOM要素にフォーカスを合わせ、エディタはフォーカスを失います。すべてのメニューボタンに `focus()` を追加して、ユーザーの書き込みフローが中断されないようにすることができます。

<!-- You have already seen the `focus()` command in the above example. When you click on the button, the browser focuses that DOM element and the editor loses focus. It’s likely you want to add `focus()` to all your menu buttons, so the writing flow of your users isn’t interrupted. -->

### アクティブ状態

エディタには、選択したテキストに何かがすでに適用されているかどうかを確認するための `isActive()` メソッドが用意されています。 Vue.js では、次のような関数を使用して CSS クラスを切り替えることができます。

<!-- The editor provides an `isActive()` method to check if something is applied to the selected text already. In Vue.js you can toggle a CSS class with help of that function like that: -->

```html
<button :class="{ 'is-active': editor.isActive('bold') }" @click="editor.chain().focus().toggleBold().run()">
  Bold
</button>
```

<!-- This toggles the `.is-active` class accordingly and works for nodes and marks. You can even check for specific attributes. Here is an example with the [`Highlight`](/api/marks/highlight) mark, that ignores different attributes: -->

これにより、それに応じて `.is-active` クラスが切り替わり、ノードとマークに対して機能します。特定の属性を確認することもできます。さまざまな属性を無視する [`Highlight`](/api/marks/highlight) マークの例を次に示します。

```js
editor.isActive('highlight')
```

<!-- And an example that compares the given attribute(s): -->

そして、与えられた属性を比較する例：

```js
editor.isActive('highlight', { color: '#ffa8a8' })
```

<!-- There is even support for regular expressions: -->


正規表現もサポートされています。

```js
editor.isActive('textStyle', { color: /.*/ })
```

<!-- You can even nodes and marks, but check for the attributes only. Here is an example with the [`TextAlign`](/api/extensions/text-align) extension: -->

ノードやマークを付けることもできますが、属性のみを確認してください。 [`TextAlign`](/api/extensions/text-align) 拡張機能の例を次に示します。

```js
editor.isActive({ textAlign: 'right' })
```

<!-- If your selection spans multiple nodes or marks, or only part of the selection has a mark, `isActive()` will return `false` and indicate nothing is active. This is how it is supposed to be, because it allows people to apply a new node or mark to that selection right-away. -->

選択範囲が複数のノードまたはマークにまたがっている場合、または選択範囲の一部にのみマークが付いている場合、 `isActive()` は  `false` を返し、アクティブなものがないことを示します。これは、人々が新しいノードまたはマークをその選択にすぐに適用できるようにするため、想定されている方法です。

## ユーザー体験

優れたユーザーエクスペリエンスを設計するときは、いくつかのことを考慮する必要があります。

<!-- When designing a great user experience you should consider a few things. -->

### アクセシビリティ

* ユーザーがキーボードでメニューをナビゲートできることを確認してください
* 適切な [タイトル属性](https://developer.mozilla.org/de/docs/Web/HTML/Global_attributes/title) を使用する
* 適切な [aria属性](https://developer.mozilla.org/en-US/docs/Learn/Accessibility/WAI-ARIA_basics)を使用する
* 利用可能なキーボードショートカットを一覧表示します

> **警告が不完全です**
このセクションにはいくつかの作業が必要です。エディターメニューを作成するときに他に何を考慮する必要があるか知っていますか？ [GitHub](https://github.com/ueberdosis/tiptap) でお知らせいただくか、[humans@tiptap.dev](mailto:humans@tiptap.dev) にメールを送信してください

<!-- * Make sure users can navigate the menu with their keyboard
* Use proper [title attributes](https://developer.mozilla.org/de/docs/Web/HTML/Global_attributes/title)
* Use proper [aria attributes](https://developer.mozilla.org/en-US/docs/Learn/Accessibility/WAI-ARIA_basics)
* List available keyboard shortcuts -->

<!-- :::warning Incomplete
This section needs some work. Do you know what else needs to be taken into account when building an editor menu? Let us know on [GitHub](https://github.com/ueberdosis/tiptap) or send us an email to [humans@tiptap.dev](mailto:humans@tiptap.dev)!
::: -->

### アイコン

<!-- Most editor menus use icons for their buttons. In some of our demos, we use the open source icon set [Remix Icon](https://remixicon.com/), which is free to use. But it’s totally up to you what you use. Here are a few icon sets you can consider: -->

ほとんどのエディタメニューは、ボタンにアイコンを使用しています。 一部のデモでは、無料で使用できるオープンソースのアイコンセット[Remix Icon](https://remixicon.com/) を使用しています。 しかし、何を使用するかは完全にあなた次第です。 検討できるアイコンセットは次のとおりです。

* [Remix Icon](https://remixicon.com/#editor)
* [Font Awesome](https://fontawesome.com/icons?c=editors)
* [UI icons](https://www.ibm.com/design/language/iconography/ui-icons/library/)
