<div class="w-full h-full editor-div">
    <div class="selection flex justify-between px-4">
        <div class="py-2">
            <label for="course">Course</label>
            <select name="course" id="" class="course select2 px-10">
                <option value=''>Select course...</option>
                @foreach ($courses as $course => $val)
                    <option value={{ $val->id }}> {{ $val->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="py-2">
            <label for="chapter">Chapter</label>
            <select name="chapter" id="" class="chapter select2 px-10 flex-1">
                <option value=''>Select chapter...</option>
            </select>
        </div>

        <div class="py-2">
            <label for="page">Page</label>
            <select name="page" id="" class="page select2 px-5 flex-1">
                <option value=''>Select page...</option>
            </select>
        </div>

    </div>
    <div name="markdown"
        class="editor w-full focus:outline-none border-b border-t border-black font-mono bg-gray-200 p-4 overflow-y-scroll">
        #Hello **Markdown**
        `edit`
    </div>
    <div class="navigation flex">
        <div class="flex justify-between m-auto w-2/5">
            <button class="edit button">
                Edit
            </button>
            <button class="new button">
                Clear
            </button>
            <button class="save button">
                Save
            </button>
        </div>
    </div>
</div>
