<?php
// Fetch all terms from the 'project_categories' taxonomy
$terms = get_terms(array(
    'taxonomy' => 'project_categories',
    'hide_empty' => false, // Set to true if you want to hide empty categories
));

// Check if any terms were returned
if (!empty($terms)) {
    foreach ($terms as $term) {
        // Get the parent term ID
        $parent_id = $term->parent;
        
        // Check if the term has a parent
        if ($parent_id!= 0) {
            // Fetch the parent term
            $parent_term = get_term_by('id', $parent_id, 'project_categories');
            
            // Display the parent term name and link
            echo '<p>Parent Category: <a href="'. esc_url(get_term_link($parent_term)). '">'. $parent_term->name. '</a></p>';
        } else {
            echo '<p>No Parent Category</p>';
        }
        
        // Display the current term name and link
        echo '<p>Current Category: <a href="'. esc_url(get_term_link($term)). '">'. $term->name. '</a></p>';
    }
}
?>
