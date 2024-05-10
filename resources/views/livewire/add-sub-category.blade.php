<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Include Livewire Styles -->
    @livewireStyles
    <style>
        /* Center the form horizontally */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Style the forms */
        form {
            width: 300px; /* Set the width of the form */
            padding: 20px; /* Add some padding */
            border: 1px solid #ccc; /* Add a border */
            border-radius: 5px; /* Add border radius */
            background-color: #f9f9f9; /* Set background color */
            margin-bottom: 20px; /* Add some space between forms */
        }
        
        /* Style form inputs and button */
        input[type="text"],
        select,
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Main Content (Form with Navigation and Footer) -->
    <main>
        <!-- Form for adding sub-categories -->
        <form wire:submit="addSubCategory">
            <h2>Add Sub-Category</h2>
            <label>Enter the sub-category name</label>
            <input type="text" wire:model="subCategoryName" >
            <label>Select the category</label>
            <select wire:model="categoryId">
                <!-- Options for selecting category -->
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">Save Sub-Category</button>
        </form>
    </main>

    <!-- Include Livewire Scripts -->
    @livewireScripts
</body>
</html>
