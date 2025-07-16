<?php

function pc_render_block($attributes, $content, $block) {
    $wrapper_attributes = get_block_wrapper_attributes(); // adds class names and styles
    ob_start(); ?>
    <div <?php echo $wrapper_attributes; ?>>
        <div class="pincode-checker-block">
            <input type="text" class="pincode-input" placeholder="Enter your pincode" />
            <button class="pincode-submit">Check</button>
            <p class="pincode-message"></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}