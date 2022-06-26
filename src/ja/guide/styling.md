---
tableOfContents: true
---

# スタイリング

## はじめに

tiptap is headless, that means there is no styling provided. That also means, you are in full control of how your editor looks. The following methods allow you to apply custom styles to the editor.

Tiptap はヘッドレスです。つまり、スタイリングは提供されません。これは、エディターの外観を完全に制御できることも意味します。次のメソッドを使用すると、カスタムスタイルをエディターに適用できます。

## オプション1：プレーンHTMLのスタイルを設定する

<!-- The whole editor is rendered inside of a container with the class `.ProseMirror`. You can use that to scope your styling to the editor content: -->

エディター全体は、クラス `.ProseMirror` を持つコンテナー内にレンダリングされます。これを使用して、スタイリングをエディターコンテンツにスコープすることができます。

```css
/* Scoped to the editor */
.ProseMirror p {
  margin: 1em 0;
}
```

<!-- If you’re rendering the stored content somewhere, there won’t be a `.ProseMirror` container, so you can just globally add styling to the used HTML tags: -->

保存されたコンテンツをどこかにレンダリングする場合、`.ProseMirror` コンテナはないため、使用する HTML タグにスタイルをグローバルに追加できます。

```css
/* Global styling */
p {
  margin: 1em 0;
}
```

## オプション2：カスタムクラスを追加する

すべてにクラスを追加することを含め、レンダリング全体を制御できます。

<!-- You can control the whole rendering, including adding classes to everything. -->

### 拡張機能

<!-- Most extensions allow you to add attributes to the rendered HTML through the `HTMLAttributes` option. You can use that to add a custom class (or any other attribute). That’s also very helpful, when you work with [Tailwind CSS](https://tailwindcss.com/). -->

ほとんどの拡張機能では、`HTMLAttributes` オプションを使用してレンダリングされたHTMLに属性を追加できます。これを使用して、カスタムクラス（またはその他の属性）を追加できます。 [Tailwind CSS](https://tailwindcss.com/) を使用する場合にも、これは非常に役立ちます。

```js
new Editor({
  extensions: [
    Document,
    Paragraph.configure({
      HTMLAttributes: {
        class: 'my-custom-paragraph',
      },
    }),
    Heading.configure({
      HTMLAttributes: {
        class: 'my-custom-heading',
      },
    }),
    Text,
  ],
})
```

レンダリングされたHTMLは次のようになります。

```html
<h1 class="my-custom-heading">Example Text</p>
<p class="my-custom-paragraph">Wow, that’s really custom.</p>
```

<!-- If there are already classes defined by the extensions, your classes will be added. -->

拡張機能によって定義されたクラスがすでに存在する場合は、クラスが追加されます。

### エディター

<!-- You can even pass classes to the element which contains the editor like that: -->

次のようなエディターを含む要素にクラスを渡すこともできます。

```js
new Editor({
  editorProps: {
    attributes: {
      class: 'prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto focus:outline-none',
    },
  },
})
```

### TailwindCSSを使用

エディターはTailwindCSSでも正常に動作します。以下の `@tailwindcss/typography` プラグインでスタイル設定された例を見つけてください。

<!-- The editor works fine with Tailwind CSS, too. Find an example that’s styled with the `@tailwindcss/typography` plugin below. -->

https://embed.tiptap.dev/preview/Experiments/Tailwind

## オプション3：HTMLをカスタマイズする

または、拡張機能のマークアップをカスタマイズできます。次の例では、`<strong>` タグではなく、`<b>` タグをレンダリングするカスタムの太字の拡張機能を作成します。

<!-- Or you can customize the markup for extensions. The following example will make a custom bold extension that doesn’t render a `<strong>` tag, but a `<b>` tag: -->

```js
import Bold from '@tiptap/extension-bold'

const CustomBold = Bold.extend({
  renderHTML({ HTMLAttributes }) {
    // Original:
    // return ['strong', HTMLAttributes, 0]
    return ['b', HTMLAttributes, 0]
  },
})

new Editor({
  extensions: [
    // …
    CustomBold,
  ],
})
```

カスタム拡張機能は別のファイルに入れる必要がありますが、私はあなたがその考えを理解したと思います。

<!-- You should put your custom extensions in separate files, but I think you got the idea. -->
