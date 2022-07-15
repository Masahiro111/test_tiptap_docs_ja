---
tableOfContents: true
---

# ノード

## はじめに

<!-- If you think of the document as a tree, then nodes are just a type of content in that tree. Examples of nodes are paragraphs, headings, or code blocks. But nodes don’t have to be blocks. They can also be rendered inline with the text, for example for **@mentions**. -->

ドキュメントをツリーと考えると、ノードはそのツリーのコンテンツの一種にすぎません。ノードの例は、段落、見出し、またはコードブロックです。ただし、ノードはブロックである必要はありません。たとえば、`@mentions` の場合は、テキストとインラインでレンダリングすることもできます。

## サポートされているノードのリスト

| Title                                        | StarterKit ([view](/api/extensions/starter-kit)) | Source Code                                                                                  |
| -------------------------------------------- | ------------------------------------------------ | -------------------------------------------------------------------------------------------- |
| [Blockquote](/api/nodes/blockquote)          | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-blockquote/)      |
| [BulletList](/api/nodes/bullet-list)         | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bullet-list/)     |
| [CodeBlock](/api/nodes/code-block)           | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-code-block/)      |
| [Document](/api/nodes/document)              | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-document/)        |
| [Emoji](/api/nodes/emoji)                    | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-emoji/)           |
| [HardBreak](/api/nodes/hard-break)           | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-hard-break/)      |
| [Hashtag](/api/nodes/hashtag)                | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-hashtag/)         |
| [Heading](/api/nodes/heading)                | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-heading/)         |
| [HorizontalRule](/api/nodes/horizontal-rule) | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-horizontal-rule/) |
| [Image](/api/nodes/image)                    | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-image/)           |
| [ListItem](/api/nodes/list-item)             | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-list-item/)       |
| [Mention](/api/nodes/mention)                | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-mention/)         |
| [OrderedList](/api/nodes/ordered-list)       | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-ordered-list/)    |
| [Paragraph](/api/nodes/paragraph)            | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-paragraph/)       |
| [Table](/api/nodes/table)                    | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table/)           |
| [TableRow](/api/nodes/table-row)             | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table-row/)       |
| [TableCell](/api/nodes/table-cell)           | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table-cell/)      |
| [TaskList](/api/nodes/task-list)             | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-task-list/)       |
| [TaskItem](/api/nodes/task-item)             | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-task-item/)       |
| [Text](/api/nodes/text)                      | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text/)            |

## 新しいノートの作成

Tiptap 用に独自のノードを自由に作成できます。独自のノードを作成して登録するために必要な定型コードは次のとおりです。

<!-- You’re free to create your own nodes for Tiptap. Here is the boilerplate code that’s need to create and register your own node: -->

```js
import { Node } from '@tiptap/core'

const CustomNode = Node.create({
  // Your code here
})

const editor = new Editor({
  extensions: [
    // Register your custom node with the editor.
    CustomNode,
    // … and don’t forget all other extensions.
    Document,
    Paragraph,
    Text,
    // …
  ],
})
```

参考 [more about custom extensions in our guide](/guide/custom-extensions).
