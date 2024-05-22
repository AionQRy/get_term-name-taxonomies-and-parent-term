<?php
// Fetch all terms from the 'project_categories' taxonomy
$terms = get_terms(array(
    'taxonomy' => 'project_categories',
    'hide_empty' => false, // Show even empty categories
    'include' => array(1, 2), // Include specific term IDs
    'exclude' => array(3, 4), // Exclude specific term IDs
    'number' => 5, // Limit the number of terms retrieved
    'offset' => 10, // Skip the first N terms
    'fields' => 'all', // What fields to return ('ids', 'all')
    'orderby' => 'name', // Order by field ('id', 'name', etc.)
    'order' => 'ASC', // Order type ('ASC', 'DESC')
    'slug' => 'example-slug', // Slug to match exactly
    'search' => '', // Search term(s)
    'hierarchical' => true, // Whether to return hierarchical terms
    'child_of' => 0, // Only children of this term
    'parent' => 0, // Only direct parents of this term
    'pad_counts' => false, // Pad counts of child terms
    'echo' => false, // Whether to echo terms
    'feed' => '', // Feed link prefix
    'feed_type' => '', // Feed type, if 'feed'
    'feed_class' => '', // CSS class used for enclosing feed link
    'feed_image' => '', // URL of feed image to show for syndication links
    'link' => '', // HTML link wrapped around term
    'title_li' => '', // List items title attribute
    'walker' => '', // Instance of Walker_Term to walk the tree
    'separator' => ', ', // Terms are joined by this string
    'popular_terms' => false, // Whether to retrieve popular terms
    'tax_query' => array(), // Taxonomy query parameters
    'update_post_meta_cache' => true, // Update post meta cache
    'update_term_meta_cache' => true, // Update term meta cache
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
