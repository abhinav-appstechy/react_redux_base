import { useState, useEffect } from "react";
import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
import "./App.css";
import Header from "./Components/Header";
import Footer from "./Components/Footer";
import HomePage from "./Components/HomePage";
import AboutUsPage from "./Components/AboutUsPage";
import PlanPage from "./Components/PlanPage";
import ContactUsPage from "./Components/ContactUsPage";
import LoginModal from "./Components/LoginModal";
import MyAccount from "./Components/MyAccount";
import { useDispatch, useSelector } from "react-redux";

function App() {

  const dispatch = useDispatch();
  const {isUserLoggedIn} = useSelector((store)=> store.isUserLoggedIn);

  // useEffect(() => {
  //   console.log("isUserLoggedIn",isUserLoggedIn)
  // }, [isUserLoggedIn])


  return (
    <>
      <BrowserRouter>
      
        <Header />
        <Routes>
          <Route path="/" exact element={<HomePage />}></Route>
          <Route path="/about-us" element={<AboutUsPage />}></Route>
          <Route path="/plan" element={<PlanPage />}></Route>
          <Route path="/contact-us" element={<ContactUsPage />}></Route>

          {JSON.parse(localStorage.getItem("user")) ? (
            <Route path="/my-account" element={<MyAccount />}></Route>
          ) : <Route path="/my-account" element={<Navigate to="/" />}></Route>}
          

          <Route path="*" element={<Navigate to="/" />} />
        </Routes>
        <Footer />
      </BrowserRouter>
    </>
  );
}

export default App;
