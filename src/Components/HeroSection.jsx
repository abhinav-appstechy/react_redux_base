import React from 'react';
import { Link } from 'react-router-dom';
import { allDataOfSite } from '../../allDataOfSite';

const HeroSection = () => {
  return (
    <section className="text-gray-600 body-font">
  <div className="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div className="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <h1 className="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{allDataOfSite["homepage"].hero_section_title}

      </h1>
      <p className="mb-8 leading-relaxed">{allDataOfSite.homepage.hero_section_desc}</p>
      <div className="flex justify-center">
        <button className="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">{allDataOfSite.homepage.hero_section_first_btn}</button>
        <Link to="/about-us" className="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">{allDataOfSite.homepage.hero_section_second_btn}</Link>
      </div>
    </div>
    <div className="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <img className="object-cover object-center rounded" alt="hero" src={allDataOfSite.homepage.hero_section_image} />
    </div>
  </div>
</section>
  )
}

export default HeroSection