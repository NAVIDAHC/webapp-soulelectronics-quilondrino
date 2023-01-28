@extends('homepage.layouts.app')
@section('homepage')
        @include('homepage.includes.nav')
        @include('homepage.includes.services')
        @include('homepage.includes.about')
        @include('homepage.includes.announcement')
        @include('homepage.includes.contact')
        @include('homepage.includes.team')
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
         @include('homepage.includes.team')
        
        @endsection