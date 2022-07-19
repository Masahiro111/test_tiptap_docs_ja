---
tableOfContents: true
---

# 拡張機能

## はじめに

<!-- Extensions add new capabilities to Tiptap and you’ll read the word extension here very often. Actually, there are literal Extensions. Those can’t add to the schema, but can add functionality or change the behaviour of the editor. -->

<!-- There are also some extensions with more capabilities. We call them [nodes](/api/nodes) and [marks](/api/marks) which can render content in the editor. -->

拡張機能は Tiptap に新しい機能を追加し、ここで拡張機能という言葉を頻繁に読みます。 実際には、文字通りの拡張機能があります。 これらはスキーマに追加できませんが、機能を追加したり、エディターの動作を変更したりすることはできます。

より多くの機能を備えたいくつかの拡張機能もあります。 これらを [nodes](/api/nodes) と [marks](/api/marks) と呼び、エディターでコンテンツをレンダリングできます。

## 提供されている拡張機能のリスト
| タイトル| StarterKit ([view](/api/extensions/starter-kit)) | ソースコード |
| ----------------------------------------------------------- | ------------------------------------------------ | ------------------------------------------------------------------------------------------------- |
| [BubbleMenu](/api/extensions/bubble-menu)                   | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bubble-menu/)          |
| [CharacterCount](/api/extensions/character-count)           | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-character-count/)      |
| [Collaboration](/api/extensions/collaboration)              | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration/)        |
| [CollaborationCursor](/api/extensions/collaboration-cursor) | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration-cursor/) |
| [Color](/api/extensions/color)                              | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-color/)                |
| [Dropcursor](/api/extensions/dropcursor)                    | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-dropcursor/)           |
| [FloatingMenu](/api/extensions/floating-menu)               | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-floating-menu/)        |
| [Focus](/api/extensions/focus)                              | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-focus/)                |
| [FontFamily](/api/extensions/font-family)                   | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-font-family/)          |
| [Gapcursor](/api/extensions/gapcursor)                      | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-gapcursor/)            |
| [History](/api/extensions/history)                          | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-history/)              |
| [Placeholder](/api/extensions/placeholder)                  | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-placeholder/)          |
| [StarterKit](/api/extensions/starter-kit)                   | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/starter-kit/)                    |
| [TextAlign](/api/extensions/text-align)                     | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text-align/)           |
| [UniqueID](/api/extensions/unique-id)                       | –                                                | Requires a Tiptap Pro subscription                                                                |
| [Typography](/api/extensions/typography)                    | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-typography/)           |

<!-- You don’t have to use it, but we prepared a `@tiptap/starter-kit` which includes the most common extensions. Read more about [`StarterKit`](/guide/configuration#default-extensions). -->

使用する必要はありませんが、最も一般的な拡張機能を含む `@tiptap/starter-kit` を用意しました。 [`StarterKit`](/guide/configuration#default-extensions) の詳細をご覧ください。

## 拡張機能の仕組み

Tiptap は ProseMirror の複雑さのほとんどを隠そうとしますが、API の上に構築されているため、高度な使用法については [ProseMirrorガイド](https://ProseMirror.net/docs/guide/) を読むことをお勧めします。すべてが内部でどのように機能するかをよりよく理解し、Tiptap で使用される多くの用語や専門用語に慣れることができます。

既存の [nodes](/api/nodes), [marks](/api/marks) と [extensions](/api/extensions) は、独自の拡張機能にアプローチする方法について良い印象を与えることができます。ドキュメントとソースコードを簡単に切り替えることができるように、すべての拡張ドキュメントページから GitHub 上のファイルにリンクしました。

最初に既存の拡張機能をカスタマイズすることから始め、後で得た知識を使用して独自の拡張機能を作成することをお勧めします。そのため、以下の例はすべて既存の拡張機能を拡張していますが、すべての例は新しく作成された拡張機能でも機能します。

<!-- Although Tiptap tries to hide most of the complexity of ProseMirror, it’s built on top of its APIs and we recommend you to read through the [ProseMirror Guide](https://ProseMirror.net/docs/guide/) for advanced usage. You’ll have a better understanding of how everything works under the hood and get more familiar with many terms and jargon used by Tiptap. -->

<!-- Existing [nodes](/api/nodes), [marks](/api/marks) and [extensions](/api/extensions) can give you a good impression on how to approach your own extensions. To make it easier to switch between the documentation and the source code, we linked to the file on GitHub from every single extension documentation page. -->

<!-- We recommend to start with customizing existing extensions first, and create your own extensions with the gained knowledge later. That’s why all the below examples extend existing extensions, but all examples will work on newly created extensions aswell. -->

## 新しい拡張機能を作成します

Tiptap 用の独自の拡張機能を自由に作成できます。独自の拡張機能を作成して登録するために必要な定型コードは次のとおりです。

<!-- You’re free to create your own extensions for Tiptap. Here is the boilerplate code that’s need to create and register your own extension: -->

```js
import { Extension } from '@tiptap/core'

const CustomExtension = Extension.create({
  // Your code here
})

const editor = new Editor({
  extensions: [
    // Register your custom extension with the editor.
    CustomExtension,
    // … and don’t forget all other extensions.
    Document,
    Paragraph,
    Text,
    // …
  ],
})
```

Learn [more about custom extensions in our guide](/guide/custom-extensions).

