<?php

namespace Libs;

/**
 * Language class
 * Based on Polylang
 * Docs: https://polylang.wordpress.com/documentation/documentation-for-developers/functions-reference/
 */
class Language
{
    /**
     * Displays a language switcher.
     *
     * 'dropdown' displays a list if set to 0, a dropdown list if set to 1 (default: 0)
     * 'show_names' displays language names if set to 1 (default: 1)
     * 'display_names_as' either 'name' or 'slug' (default: 'name')
     * 'show_flags' displays flags if set to 1 (default: 0)
     * 'hide_if_empty' hides languages with no posts (or pages) if set to 1 (default: 1)
     * 'force_home' forces link to homepage if set to 1 (default: 0)
     * 'echo' echoes if set to 1, returns a string if set to 0 (default: 1)
     * 'hide_if_no_translation' hides the language if no translation exists if set to 1 (default: 0)
     * 'hide_current'hides the current language if set to 1 (default: 0)
     * 'post_id' if set, displays links to translations of the post (or page) defined by post_id (default: null)
     * 'raw' use this to create your own custom language switcher (default:0)
     * 
     * @param array $args (required)
     * @return mixed
     */
    public static function the_languages(array $args)
    {
        if (function_exists('pll_the_languages')) {
            return pll_the_languages($args);
        }

        return null;
    }

    /**
     * Returns the list of languages
     * 
     * 'hide_empty' hides languages with no posts if set to 1 (default: 0)
     * 'fields' returns only that field if set. Possible values are 'slug', 'locale', 'name', defaults to 'slug'
     *
     * @param array $args (optional)
     * @return mixed
     */
    public static function languages_list(array $args = array())
    {
        if (function_exists('pll_languages_list')) {
            return pll_languages_list($args);
        }

        return null;
    }

    /**
     * Returns the current language
     * returns either the full name, or the WordPress locale
     * 
     * @param string $value (optional) either 'name' or 'locale' or 'slug'
     * @return mixed
     */
    public static function current_language(string $value = 'slug')
    {
        if (function_exists('pll_current_language')) {
            return pll_current_language($value);
        }

        return null;
    }

    /**
     * Returns the default language
     * Returns either the full name, or the WordPress local
     * 
     * @param string $value (optional) either 'name' or 'locale' or 'slug'
     * @return mixed
     */
    public static function default_language(string $value = 'slug')
    {
        if (function_exists('pll_default_language')) {
            return pll_default_language($value);
        }

        return null;
    }

    /**
     * Returns the post (or page) translation
     * Returns the id of the translated post or page as integer.
     * 
     * @param integer $post_id (required) id of the post you want the translation
     * @param string $slug (optional) 2-letters code of the language, defaults to current language
     * @return mixed
     */
    public static function get_post(int $post_id, string $slug = '')
    {
        if (function_exists('pll_get_post')) {
            return pll_get_post($post_id, $slug);
        }

        return null;
    }

    /**
     * Gets the language of a post or page (or custom post type post)
     * Returns either the full name, or the WordPress locale or the slug ( 2-letters code) of the post.
     * 
     * @param integer $post_id (required) id of the post for which you want to get the language
     * @param string $field (optional) either 'name' or 'locale' or 'slug'
     * @return mixed
     */
    public static function get_post_language(int $post_id, string $field = 'slug')
    {
        if (function_exists('pll_get_post_language')) {
            return pll_get_post_language($post_id, $field);
        }

        return null;
    }

    /**
     * Counts posts in a defined language
     * 
     * @param string $lang (required) language code
     * @param array $args (optional) allows to restrict the count to a certain class of post archive. Accepted keys are 'post_type', 'm,' 'year', 'monthnum', 'day', 'author', 'author_name', 'post_format'
     * @return mixed
     */
    public static function count_posts(string $lang, array $args = array())
    {
        if (function_exists('pll_count_posts')) {
            return pll_count_posts($lang, $args);
        }

        return null;
    }

    /**
     * Returns the category (or post tag) translation
     * Returns the id of the translated term as integer.
     * 
     * @param integer $term_id (required) id of the term you want the translation
     * @param string $slug (optional) 2-letters code of the language, defaults to current language
     * @return mixed
     */
    public static function get_term(int $term_id, string $slug = '')
    {
        if (function_exists('pll_get_term')) {
            return pll_get_term($term_id, $slug);
        }

        return null;
    }

    /**
     * Gets the language of a category or post tag (or custom taxonomy term)
     * Returns either the full name, or the WordPress locale or the slug ( 2-letters code) of the term.
     * 
     * @param integer $term_id (required) id of the term for which you want to get the language
     * @param string $field (optional) either 'name' or 'locale' or 'slug'
     * @return mixed
     */
    public static function get_term_language(int $term_id, string $field = 'slug')
    {
        if (function_exists('pll_get_term_language')) {
            return pll_get_term_language($term_id, $field);
        }

        return null;
    }

    /**
     * Returns the home page url
     * Returns the url of the homepage in the requested language, as a string.
     * 
     * @param string $slug 2-letters code of the language. The parameter is optional and defaults to the current language if the function is called on frontend.
     * @return mixed
     */
    public static function home_url(string $slug = '')
    {
        if (function_exists('pll_home_url')) {
            return pll_home_url($slug);
        }

        return null;
    }
}
