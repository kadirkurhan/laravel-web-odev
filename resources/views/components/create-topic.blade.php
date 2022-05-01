<div id="ex1" class="modal p-12">
    <script type="text/javascript" src="{{ URL::asset('js/createTopic.js') }}"></script>
    <p class="text-gray-800 font-semibold text-xl mb-6">Gündem oluştur</p>
    <form class="min-w-full">
        <div class="min-w-full">
            <label class="text-sm">Gündem Başlığı</label>
            <input type="text" placeholder="Gündem Başlığı"
                class="block border-none placeholder:text-gray-300 text-sm ring-gray-300 focus:ring-blue-300 ring-1 ring-inset rounded-md bg-white py-3 px-4 focus:outline-none w-full mt-2"
                id="topic" required>
        </div>
        <input id="createTopicSubmit" type="button"
            class="block border-none text-white text-sm bg-indigo-500 py-3 px-4 w-100 rounded-md focus:outline-none w-full mt-8"
            value="Gündem oluştur">

    </form>
</div>