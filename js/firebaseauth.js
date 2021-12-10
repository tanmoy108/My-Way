// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAWUBBPrPRynZ9TszysqeMNMSdniEjv8Gs",
  authDomain: "bus-management-23273.firebaseapp.com",
  projectId: "bus-management-23273",
  storageBucket: "bus-management-23273.appspot.com",
  messagingSenderId: "499134959675",
  appId: "1:499134959675:web:a47e7ee92225e64f808c1e",
  measurementId: "G-11DNGTN5J6"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);