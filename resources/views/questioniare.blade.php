<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Question Builder</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
  <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-6 space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-bold text-gray-700">Create Question</h1>
      <select class="border rounded-lg px-3 py-1 text-sm">
        <option>MCQ</option>
        <option>Comprehension</option>
        <option>Fill in the Blanks</option>
      </select>
    </div>

    <!-- Question Text -->
    <div>
      <label class="block text-gray-600 font-semibold mb-1">Question</label>
      <textarea class="w-full border rounded-lg p-3 h-24 resize-none" placeholder="Enter your question..."></textarea>
    </div>

    <!-- Optional Image Upload -->
    <div class="border-dashed border-2 border-gray-300 rounded-lg p-4 text-center text-sm text-gray-500">
      <p>Drag & drop or click to upload an image (optional)</p>
    </div>

    <!-- Options -->
    <div class="space-y-3">
      <div class="flex items-center space-x-2">
        <input type="radio" name="option" class="accent-blue-600" />
        <input type="text" placeholder="Option 1" class="flex-1 border rounded-lg p-2" />
      </div>
      <div class="flex items-center space-x-2">
        <input type="radio" name="option" class="accent-blue-600" />
        <input type="text" placeholder="Option 2" class="flex-1 border rounded-lg p-2" />
      </div>
      <div class="flex items-center space-x-2">
        <input type="radio" name="option" class="accent-blue-600" />
        <input type="text" placeholder="Option 3" class="flex-1 border rounded-lg p-2" />
      </div>
    </div>

    <!-- Explanation -->
    <div>
      <label class="block text-gray-600 font-semibold mb-1">Explanation (Optional)</label>
      <textarea class="w-full border rounded-lg p-3 h-20 resize-none" placeholder="Explain why this is the correct answer..."></textarea>
    </div>

    <!-- Buttons -->
    <div class="flex justify-end space-x-3">
      <button class="bg-red-100 text-red-600 px-4 py-2 rounded-lg">Delete</button>
      <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">Save</button>
    </div>
  </div>
</body>
</html>
