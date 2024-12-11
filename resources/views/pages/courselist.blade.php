@extends('layout.layout', ['title' => 'Course List'])

@section('head-content')
    <link rel="stylesheet" href="/css/courselist.css">
@endsection

@section('body-content')
    <main style="padding: 12px;">
        <h2 style="text-align: center; margin-bottom: 12px;">Class List</h2>
        <div style="display: flex; justify-content: center;">
            <div style="display: flex; padding: 4px; border-radius: 20px; background-color: var(--light-text-color); width: fit-content;">
                <iron-icon icon="icons:search" style="margin-right: 6px; color: white"></iron-icon>
                <input type="text" placeholder="Search" style="background: white; border: none; border-radius: 20px; padding: 0 4px; width: 100px;">  
            </div>  
        </div>
        <!-- Classes -->
        <section style="margin: 24px; background: #f5f5f5; padding: 12px; border-radius: 10px; max-height: 450px; height: 450px;">
            <div class="light-text" style="text-align: center; font-style: italic;">Click the plus button beside a class to add it to your enrolled courses</div>

            <div style="margin: auto; width: fit-content; overflow-y: auto; max-height: 400px; display: flex; flex-direction: column; flex-wrap: wrap;">
                <div class="class-container">
                    <div style="font-weight: 500; color: var(--text-color);"><a href="" class="link">CIS 110</a> Class Name</div>
                    <iron-icon icon="add" class="plus-icon"></iron-icon>
                </div>
            </div>
        </section>
    </main>
@endsection