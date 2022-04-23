<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! as a
                    @hasrole('premium-user')
                    <strong>premium user!</strong>
                    @else
                    <strong>standard user!</strong>
                    @endhasrole
                </div>
            </div>


            <div class="flex flex-row">

                @can('list tasks')

                <div x-data="{
                    tasks: [],
                    async init() {
                        this.tasks = await (await fetch('/tasks')).json()
                    }
                }" class="basis-1/2">
                    <h2 class="font-medium leading-tight text-4xl mt-0 mb-2">Tasks</h2>
                    <ul>

                        <template x-for="task in tasks" :key="task.id">
                            <li x-text="task.name"></li>
                        </template>
                    </ul>
                </div>
                @endcan
                @can('list events')
                <div x-data="{
                    events: [],
                    async init() {
                        this.events = await (await fetch('/events')).json()
                    }
                }" class="basis-1/2">
                    <h2 class="font-medium leading-tight text-4xl mt-0 mb-2">Events</h2>
                    <ul>
                        <template x-for="event in events" :key="event.id">
                            <li x-text="event.name">test</li>
                        </template>
                    </ul>
                </div>
                @endcan
            </div>
        </div>



    </div>


</x-app-layout>