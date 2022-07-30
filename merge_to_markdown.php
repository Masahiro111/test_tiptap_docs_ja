<?php

require('./vendor/autoload.php');

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\GithubFlavoredMarkdownConverter;


// configure start ---------------------------------

// 1, Check target directory
$file_dir = "src/ja/";

// configure end ---------------------------------

$filelist = array(
    // Getting started
    'introduction.md',
    'installation.md',
    'installation/react.md',
    'installation/nextjs.md',
    'installation/vue3.md',
    'installation/vue2.md',
    'installation/nuxt.md',
    'installation/svelte.md',
    'installation/alpine.md',
    'installation/php.md',
    '/overview/upgrade-guide.md',
    '/changelog.md',
    '/about.md',
    '/overview/contributing.md',
    '/jobs.md',
    '/examples/default.md',
    '/examples/collaborative-editing.md',
    '/examples/markdown-shortcuts.md',
    '/examples/menus.md',
    '/examples/tables.md',
    '/examples/images.md',
    '/examples/formatting.md',
    '/examples/tasks.md',
    '/examples/book.md',
    '/examples/drawing.md',
    '/examples/suggestions.md',
    '/examples/minimal.md',
    '/examples/custom-document.md',
    '/examples/savvy.md',
    '/examples/interactivity.md',
    '/examples/syntax-highlighting.md',
    '/guide/configuration.md',
    '/guide/menus.md',
    '/guide/styling.md',
    '/guide/output.md',
    '/guide/accessibility.md',
    '/guide/collaborative-editing.md',
    '/guide/custom-extensions.md',
    '/guide/node-views.md',
    '/guide/node-views/js.md',
    '/guide/node-views/react.md',
    '/guide/node-views/vue.md',
    '/guide/node-views/examples.md',
    '/guide/typescript.md',
    '/api/introduction.md',
    '/api/editor.md',
    '/api/commands.md',
    '/api/commands/blur.md',
    '/api/commands/clear-content.md',
    '/api/commands/clear-nodes.md',
    '/api/commands/create-paragraph-near.md',
    '/api/commands/delete-node.md',
    '/api/commands/delete-range.md',
    '/api/commands/delete-selection.md',
    '/api/commands/enter.md',
    '/api/commands/exit-code.md',
    '/api/commands/extend-mark-range.md',
    '/api/commands/focus.md',
    '/api/commands/for-each.md',
    '/api/commands/insert-content.md',
    '/api/commands/insert-content-at.md',
    '/api/commands/join-backward.md',
    '/api/commands/join-forward.md',
    '/api/commands/keyboard-shortcut.md',
    '/api/commands/lift-empty-block.md',
    '/api/commands/lift-list-item.md',
    '/api/commands/lift.md',
    '/api/commands/newline-in-code.md',
    '/api/commands/reset-attributes.md',
    '/api/commands/scroll-into-view.md',
    '/api/commands/select-all.md',
    '/api/commands/select-node-backward.md',
    '/api/commands/select-node-forward.md',
    '/api/commands/select-parent-node.md',
    '/api/commands/select-textblock-end.md',
    '/api/commands/select-textblock-start.md',
    '/api/commands/set-content.md',
    '/api/commands/set-mark.md',
    '/api/commands/set-meta.md',
    '/api/commands/set-node.md',
    '/api/commands/set-node-selection.md',
    '/api/commands/set-text-selection.md',
    '/api/commands/sink-list-item.md',
    '/api/commands/split-block.md',
    '/api/commands/split-list-item.md',
    '/api/commands/toggle-list.md',
    '/api/commands/toggle-mark.md',
    '/api/commands/toggle-node.md',
    '/api/commands/toggle-wrap.md',
    '/api/commands/undo-input-rule.md',
    '/api/commands/unset-all-marks.md',
    '/api/commands/unset-mark.md',
    '/api/commands/update-attributes.md',
    '/api/commands/wrap-in-list.md',
    '/api/nodes.md',
    '/api/nodes/blockquote.md',
    '/api/nodes/bullet-list.md',
    '/api/nodes/code-block.md',
    '/api/nodes/code-block-lowlight.md',
    '/api/nodes/document.md',
    // '/api/nodes/details.md',
    // '/api/nodes/details-summary.md',
    // '/api/nodes/details-content.md',
    // '/api/nodes/emoji.md',
    '/api/nodes/hard-break.md',
    '/api/nodes/hashtag.md',
    '/api/nodes/heading.md',
    '/api/nodes/horizontal-rule.md',
    '/api/nodes/image.md',
    '/api/nodes/list-item.md',
    '/api/nodes/mention.md',
    '/api/nodes/ordered-list.md',
    '/api/nodes/paragraph.md',
    '/api/nodes/table.md',
    '/api/nodes/table-row.md',
    '/api/nodes/table-cell.md',
    '/api/nodes/table-header.md',
    '/api/nodes/task-list.md',
    '/api/nodes/task-item.md',
    '/api/nodes/text.md',
    '/api/marks.md',
    '/api/marks/bold.md',
    '/api/marks/code.md',
    '/api/marks/highlight.md',
    '/api/marks/italic.md',
    '/api/marks/link.md',
    '/api/marks/strike.md',
    '/api/marks/subscript.md',
    '/api/marks/superscript.md',
    '/api/marks/text-style.md',
    '/api/marks/underline.md',
    '/api/extensions.md',
    '/api/extensions/bubble-menu.md',
    '/api/extensions/character-count.md',
    '/api/extensions/collaboration.md',
    '/api/extensions/collaboration-cursor.md',
    '/api/extensions/color.md',
    '/api/extensions/dropcursor.md',
    '/api/extensions/floating-menu.md',
    '/api/extensions/focus.md',
    '/api/extensions/font-family.md',
    '/api/extensions/gapcursor.md',
    '/api/extensions/history.md',
    '/api/extensions/placeholder.md',
    '/api/extensions/starter-kit.md',
    '/api/extensions/text-align.md',
    '/api/extensions/typography.md',
    // '/api/extensions/unique-id.md',
    '/api/utilities/html.md',
    '/api/utilities/suggestion.md',
    '/api/utilities/tiptap-php.md',
    '/api/keyboard-shortcuts.md',
    '/api/schema.md',
    '/api/events.md',
);


$data = "";
foreach ($filelist as $file) {
    $filedata = file_get_contents($file_dir . $file);
    $filedata = str_replace("[[toc]]\n\n", "", $filedata);
    // $filedata = preg_replace("/import .*\n/", "",  $filedata);
    $filedata = preg_replace('/\-\-\-\n[\s\S]*?\-\-\-\n/', "\n", $filedata);
    // $filedata = preg_replace('/^---$(.)^---$/', '', $filedata);
    $data .= $filedata . "\n";
}


$converter = new GithubFlavoredMarkdownConverter([
    'html_input' => 'strip',
    'allow_unsafe_links' => false,
]);

$src = '
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/5.1.0/github-markdown.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>
        <script>hljs.highlightAll();</script>
        <style>
        .markdown-body h1 {
            margin-top:3rem;
            padding: 1rem;
            background-color: #efefef;
        }

        .markdown-body h1:first {
            margin-top:0rem;
        }

        .markdown-body menu,
        .markdown-body ol,
        .markdown-body ul 
        {
            list-style: disc;
        }
        </style>
        <title>Publish html</title>
    </head>
    <body>
        <div class="markdown-body">
            ' . $converter->convert($data) . '
        </div>
    </body>
</html>
';


file_put_contents("publish_to_.md", $data);
file_put_contents("publish_to_.html", $src);
