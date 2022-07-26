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
    $file_dir . 'introduction.md',
    $file_dir . 'installation.md',
    $file_dir . 'installation/react.md',
    $file_dir . 'installation/nextjs.md',
    $file_dir . 'installation/vue3.md',
    $file_dir . 'installation/vue2.md',
    $file_dir . 'installation/nuxt.md',
    $file_dir . 'installation/svelte.md',
    $file_dir . 'installation/alpine.md',
    $file_dir . 'installation/php.md',
    $file_dir . '/overview/upgrade-guide.md',
    $file_dir . '/changelog.md',
    $file_dir . '/about.md',
    $file_dir . '/overview/contributing.md',
    $file_dir . '/jobs.md',
    $file_dir . '/examples/default.md',
    $file_dir . '/examples/collaborative-editing.md',
    $file_dir . '/examples/markdown-shortcuts.md',
    $file_dir . '/examples/menus.md',
    $file_dir . '/examples/tables.md',
    $file_dir . '/examples/images.md',
    $file_dir . '/examples/formatting.md',
    $file_dir . '/examples/tasks.md',
    $file_dir . '/examples/book.md',
    $file_dir . '/examples/drawing.md',
    $file_dir . '/examples/suggestions.md',
    $file_dir . '/examples/minimal.md',
    $file_dir . '/examples/custom-document.md',
    $file_dir . '/examples/savvy.md',
    $file_dir . '/examples/interactivity.md',
    $file_dir . '/examples/syntax-highlighting.md',
    $file_dir . '/guide/configuration.md',
    $file_dir . '/guide/menus.md',
    $file_dir . '/guide/styling.md',
    $file_dir . '/guide/output.md',
    $file_dir . '/guide/accessibility.md',
    $file_dir . '/guide/collaborative-editing.md',
    $file_dir . '/guide/custom-extensions.md',
    $file_dir . '/guide/node-views.md',
    $file_dir . '/guide/node-views/js.md',
    $file_dir . '/guide/node-views/react.md',
    $file_dir . '/guide/node-views/vue.md',
    $file_dir . '/guide/node-views/examples.md',
    $file_dir . '/guide/typescript.md',
    $file_dir . '/api/introduction.md',
    $file_dir . '/api/editor.md',
    $file_dir . '/api/commands.md',
    $file_dir . '/api/commands/blur.md',
    $file_dir . '/api/commands/clear-content.md',
    $file_dir . '/api/commands/clear-nodes.md',
    $file_dir . '/api/commands/create-paragraph-near.md',
    $file_dir . '/api/commands/delete-node.md',
    $file_dir . '/api/commands/delete-range.md',
    $file_dir . '/api/commands/delete-selection.md',
    $file_dir . '/api/commands/enter.md',
    $file_dir . '/api/commands/exit-code.md',
    $file_dir . '/api/commands/extend-mark-range.md',
    $file_dir . '/api/commands/focus.md',
    $file_dir . '/api/commands/for-each.md',
    $file_dir . '/api/commands/insert-content.md',
    $file_dir . '/api/commands/insert-content-at.md',
    $file_dir . '/api/commands/join-backward.md',
    $file_dir . '/api/commands/join-forward.md',
    $file_dir . '/api/commands/keyboard-shortcut.md',
    $file_dir . '/api/commands/lift-empty-block.md',
    $file_dir . '/api/commands/lift-list-item.md',
    $file_dir . '/api/commands/lift.md',
    $file_dir . '/api/commands/newline-in-code.md',
    $file_dir . '/api/commands/reset-attributes.md',
    $file_dir . '/api/commands/scroll-into-view.md',
    $file_dir . '/api/commands/select-all.md',
    $file_dir . '/api/commands/select-node-backward.md',
    $file_dir . '/api/commands/select-node-forward.md',
    $file_dir . '/api/commands/select-parent-node.md',
    $file_dir . '/api/commands/select-textblock-end.md',
    $file_dir . '/api/commands/select-textblock-start.md',
    $file_dir . '/api/commands/set-content.md',
    $file_dir . '/api/commands/set-mark.md',
    $file_dir . '/api/commands/set-meta.md',
    $file_dir . '/api/commands/set-node.md',
    $file_dir . '/api/commands/set-node-selection.md',
    $file_dir . '/api/commands/set-text-selection.md',
    $file_dir . '/api/commands/sink-list-item.md',
    $file_dir . '/api/commands/split-block.md',
    $file_dir . '/api/commands/split-list-item.md',
    $file_dir . '/api/commands/toggle-list.md',
    $file_dir . '/api/commands/toggle-mark.md',
    $file_dir . '/api/commands/toggle-node.md',
    $file_dir . '/api/commands/toggle-wrap.md',
    $file_dir . '/api/commands/undo-input-rule.md',
    $file_dir . '/api/commands/unset-all-marks.md',
    $file_dir . '/api/commands/unset-mark.md',
    $file_dir . '/api/commands/update-attributes.md',
    $file_dir . '/api/commands/wrap-in-list.md',
    $file_dir . '/api/nodes.md',
    $file_dir . '/api/nodes/blockquote.md',
    $file_dir . '/api/nodes/bullet-list.md',
    $file_dir . '/api/nodes/code-block.md',
    $file_dir . '/api/nodes/code-block-lowlight.md',
    $file_dir . '/api/nodes/document.md',
    // $file_dir . '/api/nodes/details.md',
    // $file_dir . '/api/nodes/details-summary.md',
    // $file_dir . '/api/nodes/details-content.md',
    // $file_dir . '/api/nodes/emoji.md',
    $file_dir . '/api/nodes/hard-break.md',
    $file_dir . '/api/nodes/hashtag.md',
    $file_dir . '/api/nodes/heading.md',
    $file_dir . '/api/nodes/horizontal-rule.md',
    $file_dir . '/api/nodes/image.md',
    $file_dir . '/api/nodes/list-item.md',
    $file_dir . '/api/nodes/mention.md',
    $file_dir . '/api/nodes/ordered-list.md',
    $file_dir . '/api/nodes/paragraph.md',
    $file_dir . '/api/nodes/table.md',
    $file_dir . '/api/nodes/table-row.md',
    $file_dir . '/api/nodes/table-cell.md',
    $file_dir . '/api/nodes/table-header.md',
    $file_dir . '/api/nodes/task-list.md',
    $file_dir . '/api/nodes/task-item.md',
    $file_dir . '/api/nodes/text.md',
    $file_dir . '/api/marks.md',
    $file_dir . '/api/marks/bold.md',
    $file_dir . '/api/marks/code.md',
    $file_dir . '/api/marks/highlight.md',
    $file_dir . '/api/marks/italic.md',
    $file_dir . '/api/marks/link.md',
    $file_dir . '/api/marks/strike.md',
    $file_dir . '/api/marks/subscript.md',
    $file_dir . '/api/marks/superscript.md',
    $file_dir . '/api/marks/text-style.md',
    $file_dir . '/api/marks/underline.md',
    $file_dir . '/api/extensions.md',
    $file_dir . '/api/extensions/bubble-menu.md',
    $file_dir . '/api/extensions/character-count.md',
    $file_dir . '/api/extensions/collaboration.md',
    $file_dir . '/api/extensions/collaboration-cursor.md',
    $file_dir . '/api/extensions/color.md',
    $file_dir . '/api/extensions/dropcursor.md',
    $file_dir . '/api/extensions/floating-menu.md',
    $file_dir . '/api/extensions/focus.md',
    $file_dir . '/api/extensions/font-family.md',
    $file_dir . '/api/extensions/gapcursor.md',
    $file_dir . '/api/extensions/history.md',
    $file_dir . '/api/extensions/placeholder.md',
    $file_dir . '/api/extensions/starter-kit.md',
    $file_dir . '/api/extensions/text-align.md',
    $file_dir . '/api/extensions/typography.md',
    // $file_dir . '/api/extensions/unique-id.md',
    $file_dir . '/api/utilities/html.md',
    $file_dir . '/api/utilities/suggestion.md',
    $file_dir . '/api/utilities/tiptap-php.md',
    $file_dir . '/api/keyboard-shortcuts.md',
    $file_dir . '/api/schema.md',
    $file_dir . '/api/events.md',
);


$data = "";
foreach ($filelist as $file) {
    $filedata = file_get_contents($file);
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
