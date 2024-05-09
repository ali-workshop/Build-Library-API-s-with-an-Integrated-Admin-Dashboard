<html>
<head>
    @livewireStyles
</head>
<body>
    <form wire:submit.prevent="AddCategory" id="categoryForm">
        <input type="text" wire:model="catName" id="catNameInput">
        <button type="submit">Save</button>
    </form>
    @livewireScripts

    <script>
        document.getElementById('catNameInput').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                document.getElementById('categoryForm').submit();
            }
        });
    </script>
</body>
</html>
