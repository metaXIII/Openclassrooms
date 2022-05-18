import { useContext } from 'react'
import { ThemeContext } from '../context'
import { createGlobalStyle } from 'styled-components'

const StyledGlobalStyle = createGlobalStyle`
    * {
      font-family: 'Trebuchet MS', Helvetica, sans-serif;
    }
    body {
        background-color: ${({ isDarkMode }) => isDarkMode ? '#2F2E41' : 'white'};
        margin: 0;
    }
`

const GlobalStyle = () => {
  const { theme } = useContext(ThemeContext)
  return (
    <StyledGlobalStyle isDarkMode={theme === 'dark'} />
  )
}

export default GlobalStyle
