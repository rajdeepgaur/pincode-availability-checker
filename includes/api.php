<?php
function pc_register_rest_api() {
    register_rest_route('pincode-checker/v1', '/check', [
        'methods' => 'POST',
        'callback' => 'pc_check_pincode',
        'permission_callback' => '__return_true',
    ]);
}

function pc_check_pincode(WP_REST_Request $request) {
    $pincode = sanitize_text_field($request->get_param('pincode'));
    $list = explode("\n", get_option('pc_deliverable_pincodes', ''));
    $list = array_map('trim', $list);
    $available = in_array($pincode, $list, true);

    return [
        'available' => $available,
        'message' => $available ? 'Delivery available!' : 'Sorry, not available.',
    ];
}
