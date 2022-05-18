import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Home from './pages/Home'
import reportWebVitals from './reportWebVitals'
import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom'
import Survey from './pages/Survey'
import Results from './pages/Results'
import Freelances from './pages/Freelances'
import Error from './components/Error'
import Header from './components/Header'
import Footer from './components/Footer'
import { SurveyProvider, ThemeProvider } from './utils/context'
import GlobalStyle from './utils/style/GlobalStyle'


const root = ReactDOM.createRoot(document.getElementById('root'))
root.render(
  <React.StrictMode>
    <BrowserRouter>
      <ThemeProvider>
        <SurveyProvider>
          <GlobalStyle />
          <Header />
          <Routes>
            <Route path='/' element={<Home />} />
            <Route path='/survey/:questionNumber' element={<Survey />} />
            <Route path='/results' element={<Results />} />
            <Route path='freelances' element={<Freelances />} />
            <Route path='error' element={<Error />} />
            <Route path='*' element={<Navigate to={'/error'} />} />
          </Routes>
          <Footer />
        </SurveyProvider>
      </ThemeProvider>
    </BrowserRouter>
  </React.StrictMode>
)

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals()
