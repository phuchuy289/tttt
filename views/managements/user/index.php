
<?php
    if (!isUserLoggedIn()) {
    header("Location: ?controller=home&action=index");
    exit;
    }
?>
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Manage user</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg
                class="moon"
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                width="24"
                height="24"
                viewBox="0 0 24 24"
            >
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>
    </div>
    <div class="app-content-actions">
        <input class="search-bar" placeholder="Search..." type="text" />
        <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper">
                <button class="action-button filter jsFilter">view</button>
            </div>
            <button class="action-button list active" title="List View">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-list"
                >
                    <line x1="8" y1="6" x2="21" y2="6" />
                    <line x1="8" y1="12" x2="21" y2="12" />
                    <line x1="8" y1="18" x2="21" y2="18" />
                    <line x1="3" y1="6" x2="3.01" y2="6" />
                    <line x1="3" y1="12" x2="3.01" y2="12" />
                    <line x1="3" y1="18" x2="3.01" y2="18" />
                </svg>
            </button>
            <button class="action-button grid" title="Grid View">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-grid"
                >
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>
            </button>
        </div>
    </div>
    <!--  -->
    <div class="products-area-wrapper tableView">
    <div class="products-header">
        <div class="product-cell image">ID</div>
        <div class="product-cell category">Name</div>
        <div class="product-cell status-cell">Email</div>
        <div class="product-cell sales">Username</div>
        <div class="product-cell stock">Password</div>
        <div class="product-cell price">Actions</div>
    </div>

    <?php foreach ($users as $user): ?>
    <div class="products-row">
        <div class="product-cell image">
            <span><?= $user['id']; ?></span>
        </div>
        <div class="product-cell category">
            <span class="cell-label">Name:</span><?= $user['name']; ?>
        </div>
        <div class="product-cell status-cell">
            <span class="cell-label">Email:</span><?= $user['email']; ?>
        </div>
        <div class="product-cell sales">
            <span class="cell-label">Username:</span><?= $user['username']; ?>
        </div>
        <div class="product-cell stock">
            <span class="cell-label">Password:</span><?= $user['password']; ?>
        </div>
        <div class="product-cell price">
            <!-- Nút Xóa -->
    <form action="?controller=userManage&action=deleteUser&id=<?= $user['id']; ?>" method="POST" style="display:inline;">
        <button type="submit" class="action-button delete">🗑️</button>
    </form>
        </div>
    </div>
    <?php endforeach; ?>
</div>