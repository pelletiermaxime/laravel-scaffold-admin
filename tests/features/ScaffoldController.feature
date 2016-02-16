Feature: Generate Controllers

    Scenario: Create a controller "Posts" with default options
      When I create the controller "Posts"
      Then the file "app/Http/Controllers/Admin/PostsController.php" should exists
        And it should have the class "PostsController"
        And it should be in the namespace "App\Http\Controllers\Admin"
        And the routes file should contain a route "posts" linked to "Admin\Posts"
